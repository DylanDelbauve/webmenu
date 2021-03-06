<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\Core\Configure;
use Cake\ORM\Entity;

class MenusController extends AppController
{
    public function initialize(): void
    {
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Authentication.Authentication');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // pour tous les contrôleurs de notre application, rendre les actions
        // index et view publiques, en ignorant la vérification d'authentification
        $this->Authentication->addUnauthenticatedActions(['show']);
    }

    public $paginate = ['limit' => 10, 'orders' => ['Menus.name' => 'asc']];

    public function index()
    {
        $this->loadComponent('Paginator');
        $menus = $this->Paginator->paginate($this->Menus->find()->order(['date' => 'DESC']), $this->paginate);
        $this->set(compact('menus'));
    }

    public function view($id = null)
    {
        $menu = $this->Menus->findById($id)->contain(['Dishes', 'Dishes.DishTypes', 'Dishes.Allergens'])->firstOrFail();

        if ($this->request->is('ajax')) {
            $this->RequestHandler->renderAs($this, 'json');
            $this->response->withType('application/json');

            $this->RequestHandler->respondAs('json');
            $this->viewBuilder()->setLayout('ajax');

            // Créer un contexte sites à renvoyer 
            $this->set('menu', $menu);

            // Généreration des vues de données
            $this->set('_serialize', ['menu']);
        }
        $this->set(compact('menu'));
    }

    public function add()
    {
        $menu = $this->Menus->newEmptyEntity();
        if ($this->request->is('post')) {
            $menu = $this->Menus->patchEntity($menu, $this->request->getData());
            if ($menu->name == null)
                $menu->name = "";
            if ($this->Menus->save($menu)) {
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible d\'ajouter votre menu.'));
        }
        $this->set('menu', $menu);
    }

    public function edit($id)
    {
        $menu = $this->Menus->findById($id)->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Menus->patchEntity($menu, $this->request->getData());
            if ($this->Menus->save($menu)) {
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible de mettre à jour le menu.'));
        }

        $this->set('menu', $menu);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $menu = $this->Menus->findById($id)->firstOrFail();
        if ($this->Menus->delete($menu)) {
            return $this->redirect(['action' => 'index']);
        }
    }

    public function editdishes($id)
    {
        $menu = $this->Menus->findById($id)->contain(['Dishes', 'Dishes.DishTypes'])->firstOrFail();

        $dishesTable = TableRegistry::getTableLocator()->get('Dishes');
        $query = $dishesTable->find('all')->toArray();
        foreach ($query as $value) {
            $dishes[$value->id] = $value->name;
        };
        $this->set('dishes', $dishes);

        $dishTypesTable = TableRegistry::getTableLocator()->get('DishTypes');
        $query = $dishTypesTable->find('all')->toArray();
        foreach ($query as $value) {
            $dishtypes[$value->id] = $value->name;
        };
        $this->set('dishtypes', $dishtypes);

        if ($this->request->is(['post', 'put'])) {
            $dishesAdded = array();
            debug($this->request->getData());
            foreach ($this->request->getData() as $id) {
                foreach ($dishes as $dish) {
                    if ($dish->id == $id)
                        array_push($dishesAdded, $dish);
                }
            }
            array_merge($menu->dishes, $dishesAdded);
            if ($this->Menus->save($menu)) {
                $this->Flash->success(__('Votre menu a été mis à jour.'));
                return $this->redirect(['action' => 'get', $menu->id]);
            }
            $this->Flash->error(__('Impossible de mettre à jour le menu.'));
        }

        $this->set('menu', $menu);
    }

    public function getdishes($id)
    {

        if ($this->request->is('ajax')) {
            $this->RequestHandler->renderAs($this, 'json');
            $this->response->withType('application/json');
            $dishesTable = TableRegistry::getTableLocator()->get('Dishes');
            $response = $dishesTable->find('all')->contain('DishTypes');
            if ($id != 0) {
                $id = intval($id);
                $response = $response->where(['dish_type_id' => $id]);
            }

            $this->RequestHandler->respondAs('json');
            $this->viewBuilder()->setLayout('ajax');

            // Créer un contexte sites à renvoyer 
            $this->set('dishes', $response);

            // Généreration des vues de données
            $this->set('_serialize', ['dishes']);
        }
    }

    public function editdish()
    {
        $idMenu = $this->request->getData('idMenu');
        $idDish = $this->request->getData('idDish');
        $priority = $this->request->getData('priority');
        if ($priority === "") {
            $priority = 1;
        }
        $menu = $this->Menus->findById($idMenu)->contain(['Dishes'])->first();
        $this->response->withType('application/json');
        $dishesTable = TableRegistry::getTableLocator()->get('Dishes');
        $dish = $dishesTable->get($idDish);
        if ($this->request->is('put')) {
            $dish->_joinData = new Entity(['priority' => $priority]);
            $this->Menus->Dishes->link($menu, [$dish]);
        } else if ($this->request->is('delete')) {
            $this->Menus->Dishes->unlink($menu, [$dish]);
        }

        $this->Menus->save($menu);
        $this->RequestHandler->respondAs('json');
        $this->viewBuilder()->setLayout('ajax');
        $this->set('_serialize', ['menus']);
    }

    public function show()
    {
        Date::setJsonEncodeFormat('yyyy-MM-dd');
        $date = Date::now();
        $query = $this->Menus->find()->contain(['Dishes' => [
            'strategy' => 'select',
            'queryBuilder' => function ($q) {
                return $q->order(['DishesMenus.priority' => 'DESC']);
            }
        ], 'Dishes.DishTypes', 'Dishes.Allergens'])->where(['Menus.date =' => $date]);
        $menu = $query->first();
        $info = Configure::read('Options');
        $this->set('menu', $menu);
        $this->set('info', $info);
        $this->viewBuilder()->setLayout("menu");
    }

    public function pdf($id)
    {

        $menu = $this->Menus->findById($id)->contain(['Dishes', 'Dishes.DishTypes', 'Dishes.Allergens'])->firstOrFail();
        $this->viewBuilder()
            ->enableAutoLayout(false)
            ->setClassName('CakePdf.Pdf')
            ->setOption(
                'pdfConfig',
                [
                    'orientation' => 'portrait',
                    'download' => true,
                    'filename' => 'Menu_' . $menu->date . '.pdf'
                ]
            );
        $this->set('menu', $menu);
    }
}
