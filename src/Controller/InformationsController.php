<?php

declare(strict_types=1);

namespace App\Controller;

use SplFileObject;

/**
 * Informations Controller
 *
 * @property \App\Model\Table\InformationsTable $Informations
 * @method \App\Model\Entity\Information[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InformationsController extends AppController
{

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
        $informations = $this->paginate($this->Informations);

        $this->set(compact('informations'));
    }

    /**
     * View method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $information = $this->Informations->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('information'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $information = $this->Informations->newEmptyEntity();
        if ($this->request->is('post')) {
            $information = $this->Informations->patchEntity($information, $this->request->getData());
            if ($this->Informations->save($information)) {
                $this->Flash->success(__('The information has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The information could not be saved. Please, try again.'));
        }
        $this->set(compact('information'));
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
            $file = $this->request->getData('logo');
            debug($file);
            if ($file->getClientFilename() != null) {
                unlink(WWW_ROOT . 'img/logo.svg');
                $file->moveTo(WWW_ROOT . 'img/logo.svg');
            }
            $file = $this->request->getData('theme');
            if ($file->getClientFilename() != null) {
                unlink(WWW_ROOT . 'img/theme.jpg');

                $file->moveTo(WWW_ROOT . 'img/theme.jpg');
            }
            if ($this->Informations->save($information)) {

                return $this->redirect(['action' => '/']);
            }
            $this->Flash->error(__('The information could not be saved. Please, try again.'));
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
