<?php
namespace App\Controller;

use App\Controller\AppController;

class AllergensController extends AppController
{

    public function index()
    {
        $this->loadComponent('Paginator');
        $allergens = $this->Paginator->paginate($this->Allergens->find());
        $this->set(compact('allergens'));
    }

    public function add()
    {
        $allergen = $this->Allergens->newEmptyEntity();
        if ($this->request->is('post')) {
            $allergen = $this->Allergens->patchEntity($allergen, $this->request->getData());

            if ($this->Allergens->save($allergen)) {
                $this->Flash->success(__('Votre allergène a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible d\'ajouter votre allergène.'));
        }
        $this->set('allergen', $allergen);
    }

    public function edit($id)
    {
        $allergen = $this->Allergens->findById($id)->firstOrFail();
        if ($this->request->is(['post', 'put'])) {
            $this->Allergens->patchEntity($allergen, $this->request->getData());
            if ($this->Allergens->save($allergen)) {
                $this->Flash->success(__('Votre allergen a été mis à jour.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible de mettre à jour l\'allergen.'));
        }
    
        $this->set('allergen', $allergen);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $allergen = $this->Allergens->findById($id)->firstOrFail();
        if ($this->Allergens->delete($allergen)) {
            $this->Flash->success(__('L\'allergène {0} a été supprimé.', $allergen->name));
            return $this->redirect(['action' => 'index']);
        }
    }
}