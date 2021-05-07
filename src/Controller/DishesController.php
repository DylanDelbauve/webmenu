<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class DishesController extends AppController
{
    public $paginate = ['limit' => 10, 'orders' => ['Dishes.date' => 'asc'], 'contain' => ['DishTypes'], 'sortableFields' => ['name', 'DishTypes.name']];

    public function index()
    {

        $this->loadComponent('Paginator');
        $dishes = $this->Paginator->paginate($this->Dishes->find(), $this->paginate);
        $this->set(compact('dishes'));
    }

    public function view($id)
    {
        $dish = $this->Dishes->findById($id)->contain(['Allergens', 'DishTypes'])->first();
        $this->set(compact('dish'));
    }

    public function add()
    {
        $dishTypesTable = TableRegistry::getTableLocator()->get('DishTypes');
        $query = $dishTypesTable->find()->toArray();
        $dishtypes = array();
        foreach ($query as $value) {
            $dishtypes[$value->id] = $value->name;
        };

        $dish = $this->Dishes->newEmptyEntity();
        if ($this->request->is('post')) {
            $dish = $this->Dishes->patchEntity($dish, $this->request->getData());

            if ($this->Dishes->save($dish)) {
                $this->Flash->success(__('Votre plat a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible d\'ajouter votre plat.'));
        }
        $this->set(compact('dish', 'dishtypes'));
    }

    public function edit($id)
    {
        $dishTypesTable = TableRegistry::getTableLocator()->get('DishTypes');
        $query = $dishTypesTable->find()->toArray();
        $dishtypes = array();
        foreach ($query as $value) {
            $dishtypes[$value->id] = $value->name;
        };

        $dish = $this->Dishes->findById($id)->contain('DishTypes')->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Dishes->patchEntity($dish, $this->request->getData());
            if ($this->Dishes->save($dish)) {
                $this->Flash->success(__('Votre plat a été mis à jour.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible de mettre à jour le plat.'));
        }

        $this->set(compact('dish', 'dishtypes'));
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $dish = $this->Dishes->findById($id)->firstOrFail();
        if ($this->Dishes->delete($dish)) {
            $this->Flash->success(__('Le plat {0} a été supprimé.', $dish->name));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function editallergens($id, $back = null)
    {
        $dish = $this->Dishes->findById($id)->contain(['Allergens'])->firstOrFail();

        $allergensTable = TableRegistry::getTableLocator()->get('Allergens');
        $allergens = $allergensTable->find('all')->toArray();
        $this->set('allergens', $allergens);
        if ($this->request->referer() != $this->request->getRequestTarget())
            $back = $this->request->referer();

        if ($this->request->is(['post', 'put'])) {
            $allergensAdded = array();
            foreach ($this->request->getData() as $id) {
                foreach ($allergens as $allergen) {
                    if ($allergen->id == $id)
                        array_push($allergensAdded, $allergen);
                }
            }
            $dish->allergens = $allergensAdded;
            if ($this->Dishes->save($dish)) {
                $this->Flash->success(__('Les allergènes du plat ont été mit à jour.'));
                if ($back != null) {
                    return $this->redirect(['controller' => 'Menus', 'action' => 'get', $back]);
                }
                return $this->redirect(['action' => 'get', $dish->id]);
            }
            $this->Flash->error(__('Impossible de mettre à jour le plat.'));
        }

        $this->set(compact('dish','back'));
    }
}
