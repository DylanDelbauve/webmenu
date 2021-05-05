<?php

declare(strict_types=1);

namespace App\Controller;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Core\Configure;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize(): void
    {
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Authentication.Authentication');
        $this->loadComponent('Flash');
    }

    protected function _setPassword(string $password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $auth = $this->request->getSession()->read('Auth');
        $users = $this->paginate($this->Users);

        $this->set(compact('users', 'auth'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $auth = $this->request->getSession()->read('Auth');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user', 'auth'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->password = $this->_setPassword($user->password);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('L\'utilisateur n\'as pas pu être enregistré.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $auth = $this->request->getSession()->read('Auth');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($user->id == $auth->id || $auth->id == 1) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if (!empty($this->request->getData('password')))
                    $user->password = $this->_setPassword($user->password);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('L\'utilisateur a bien été modifié'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('L\'utilisateur n\'as pas pu être enregistré.'));
            } else {
                $this->Flash->error(__('L\'utilisateur n\'as pas pu être enregistré (Vous n\'êtes pas l\'utilisateur de ce compte)'));
            }
        }
        $this->set(compact('user'));
    }

    public function changePassword($id)
    {
        $auth = $this->request->getSession()->read('Auth');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($user->id == $auth->id || $auth->id == 1) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if (!empty($this->request->getData('password')))
                    $user->password = $this->_setPassword($user->password);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Le mot de passe a bien été modifié'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Le mot de passe n\'a pas pu être enregistré'));
            } else {
                $this->Flash->error(__('Le mot de passe n\'a pas pu être enregistré (Vous n\'êtes pas l\'utilisateur de ce compte)'));
            }
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $auth = $this->request->getSession()->read('Auth');
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($user->id == $auth->id || $auth->id == 1) {
            if ($user->id != 1) {
                if ($this->Users->delete($user)) {
                    $this->Flash->success(__('L\'utilisateur a été supprimé'));
                } else {
                    $this->Flash->error(__('Une erreur est survenue'));
                }
            } else {
                $this->Flash->error(__('Cette utilisateur ne peut pas être supprimé (Super Admin)'));
            }
        } else {
            $this->Flash->error(__('Vous n\'avez pas l\'autorisation de supprimer cette utilisateur'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login', 'forgotPassword', 'resetPasswordToken']);
    }

    public function login()
    {
        $info = Configure::read('Options');
        $this->set('info', $info);
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Menus',
                'action' => 'index',
            ]);

            return $this->redirect('/menus');
        }

        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Votre identifiant ou votre mot de passe est incorrect.'));
        }
        $this->viewBuilder()->setLayout("auth");
    }

    public function logout()
    {

        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
}
