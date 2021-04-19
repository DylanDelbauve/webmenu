<?php

declare(strict_types=1);

namespace App\Controller;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Utility\Security;

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
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
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

        $this->set(compact('user'));
        $this->set(compact('auth'));
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
            if ($user->id == $auth->id) {
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
            if ($user->id == $auth->id) {
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
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configurez l'action de connexion pour ne pas exiger d'authentification,
        // évitant ainsi le problème de la boucle de redirection infinie
        $this->Authentication->addUnauthenticatedActions(['login', 'forgotPassword', 'resetPasswordToken']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // indépendamment de POST ou GET, rediriger si l'utilisateur est connecté
        if ($result->isValid()) {
            // rediriger vers /articles après la connexion réussie
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Pages',
                'action' => 'index',
            ]);

            return $this->redirect('/');
        }
        // afficher une erreur si l'utilisateur a soumis le formulaire
        // et que l'authentification a échoué
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Votre identifiant ou votre mot de passe est incorrect.'));
        }
        $this->viewBuilder()->setLayout("auth");
    }

    public function logout()
    {

        $result = $this->Authentication->getResult();
        // indépendamment de POST ou GET, rediriger si l'utilisateur est connecté
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function forgotPassword()
    {
        if ($this->request->is('post')) {
            $user = $this->Users->findByEmail($this->request->getData('email'))->first();
            if ($user != null) {
                $user = $this->generateToken($user);
                if ($this->Users->save($user)) {
                    $this->sendMail($user);
                    $this->Flash->success(__('Votre demande a été prise en charge. Veuillez vérifier votre boîte mail'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                }
            } else {
                $this->Flash->error(__('Adresse mail incorrect'));
            }
        }
        $this->viewBuilder()->setLayout("auth");
    }

    public function generateToken($user)
    {
        if (empty($user)) {
            return null;
        }
        $token = "";
        for ($i = 0; $i < 100; $i++) {
            $d = rand(1, 100000) % 2;
            $d ? $token .= chr(rand(33, 79)) : $token .= chr(rand(80, 126));
        }

        (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;

        // Generate hash of random string
        $hash = Security::hash($token, 'sha256', true);;
        for ($i = 0; $i < 20; $i++) {
            $hash = Security::hash($hash, 'sha256', true);
        }

        $user->reset_password_token = $hash;
        $user->token_created_at = date('Y-m-d H:i:s');

        return $user;
    }

    public function sendMail($user)
    {
        TransportFactory::setConfig('maildev', [
            'host' => 'localhost',
            'port' => 1025,
            'username' => null,
            'password' => null,
            'className' => 'Smtp'
        ]);

        $mail = new Mailer();
        $mail->setEmailFormat('html')
            ->setTo($user->email)
            ->setSubject('Mot de passe oublié - NE PAS RÉPONDRE')
            ->setFrom('app@domain.com')
            ->setTransport('maildev')
            ->viewBuilder()
            ->setVar('user', $user)
            ->setTemplate('reset_password');
        $mail->deliver('Reset password: http://' . env('SERVER_NAME') . ':8765/users/reset_password_token/' . $user->reset_password_token);
    }

    public function resetPasswordToken($token)
    {
        $user = $this->Users->findByResetPasswordToken($token)->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user->password = $this->request->getData('new_password');
            $user->password = $this->_setPassword($user->password);
            $user->token_created_at = null;
            $user->reset_password_token = null;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Le nouveau mot de passe a bien été enregistré'));

                return $this->redirect(['action' => 'home']);
            }
            $this->Flash->error(__('Une erreur est survenue'));
        }
        $this->set(compact('user'));
        $this->viewBuilder()->setLayout("auth");
    }

    function validToken($token)
    {
        $expired = strtotime($token) + 86400;
        $time = strtotime("now");
        if ($time < $expired) {
            return true;
        }
        return false;
    }
}
