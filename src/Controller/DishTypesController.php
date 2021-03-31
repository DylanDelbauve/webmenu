<?php
namespace App\Controller;

use App\Controller\AppController;

class DishTypesController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $dishtypes = $this->Paginator->paginate($this->DishTypes->find());
        $this->set(compact('dishtypes'));
    }

    public function view($id = null)
    {
        $dishtype = $this->DishTypes->findById($id)->firstOrFail();
        $this->set(compact('dishtype'));
    }

    public function add()
    {
        $dishtype = $this->DishTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $dishtype = $this->DishTypes->patchEntity($dishtype, $this->request->getData());

            if ($this->DishTypes->save($dishtype)) {
                $this->Flash->success(__('Votre type de plat a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible d\'ajouter votre type de plat.'));
        }
        $this->set('dishtype', $dishtype);
    }

    public function edit($id)
    {
        $dishtype = $this->DishTypes->findById($id)->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->DishTypes->patchEntity($dishtype, $this->request->getData());
            if ($this->DishTypes->save($dishtype)) {
                $this->Flash->success(__('Votre type de plat a été mis à jour.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible de mettre à jour le type de plat.'));
        }
    
        $this->set('dishtype', $dishtype);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $dishtype = $this->DishTypes->findById($id)->firstOrFail();
        if ($this->DishTypes->delete($dishtype)) {
            $this->Flash->success(__('Le type de plat {0} a été supprimé.', $dishtype->type));
            return $this->redirect(['action' => 'index']);
        }
    }
}