<?php

declare(strict_types=1);

namespace App\Controller;


/**
 * Informations Controller
 *
 * @property \App\Model\Table\InformationsTable $Informations
 * @method \App\Model\Entity\Information[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InformationsController extends AppController
{
    public function initialize(): void
    {
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
    }

    public function beforeMarshal(\Cake\Event\EventInterface $event, \ArrayObject $data, \ArrayObject $options)
    {
        if ($data['logo'] === '') {
            unset($data['logo']);
        }
        if ($data['theme'] === '') {
            unset($data['theme']);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        return $this->redirect(['action' => 'edit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit()
    {
        $information = $this->Informations->find()->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $information = $this->Informations->patchEntity($information, $this->request->getData());
            $information->font = $this->request->getData()['font'];
            $information->color = $this->request->getData()['color'];
            $file = $this->request->getData('logo');
            if ($file->getClientFilename() != null) {
                unlink(WWW_ROOT . 'img/logo.png');
                $file->moveTo(WWW_ROOT . 'img/logo.png');
            }
            $file = $this->request->getData('theme');
            if ($file->getClientFilename() != null) {
                unlink(WWW_ROOT . 'img/theme.jpg');

                $file->moveTo(WWW_ROOT . 'img/theme.jpg');
            }
            if ($this->Informations->save($information)) {

                return $this->redirect(['action' => 'edit']);
                $this->Flash->valid(__('Modifications sauvegardées'));
            }
            $this->Flash->error(__('Une erreur est survenue. Veuillez réessayer'));
        } 
        $this->set(compact('information'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $information = $this->Informations->get($id);
        if ($this->Informations->delete($information)) {
            $this->Flash->success(__('The information has been deleted.'));
        } else {
            $this->Flash->error(__('The information could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
