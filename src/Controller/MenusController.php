<?php

namespace App\Controller;

use App\Controller\AppController;

class MenusController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $menus = $this->Paginator->paginate($this->Menus->find());
        $this->set(compact('menus'));
    }

    public function view($id = null)
    {
        $menu = $this->Menus->findById($id)->firstOrFail();
        $this->set(compact('menu'));
    }

    public function add()
    {
        $menu = $this->Menus->newEmptyEntity();
        if ($this->request->is('post')) {
            $menu = $this->Menus->patchEntity($menu, $this->request->getData());

            if ($this->Menus->save($menu)) {
                $this->Flash->success(__('Votre menu a été sauvegardé.'));
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
                $this->Flash->success(__('Votre menu a été mis à jour.'));
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
            $this->Flash->success(__('Le menu {0} a été supprimé.', $menu->name));
            return $this->redirect(['action' => 'index']);
        }
    }
}