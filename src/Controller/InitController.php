<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;


class InitController extends AppController
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
        $this->Authentication->addUnauthenticatedActions(['index', 'database', 'options']);
    }

    public function index()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $info = $this->request->getData();
            Configure::write('Init', $info);
            Configure::dump('options', 'options',['Options', 'Init']);
            return $this->redirect(['action' => 'database']);
        }
        $this->viewBuilder()->setLayout("init");
    }

    public function options()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $db = Configure::read('Datasources.default');
            debug($db);
            $db['username'] = $this->request->getData('username');
            $db['password'] = $this->request->getData('password');
            $db['database'] = null;
            Configure::write('Datasources.default', $db);
            Configure::dump('app', 'default');
            if(($connection = ConnectionManager::get('default')) != null) {
                $city = Configure::consume('Init.city');
                $connection->query('CREATE DATABASE IF NOT EXISTS webmenu_'.$city);
                Configure::write('Datasources.default.database', 'webmenu_'.$city);
                Configure::dump('app', 'default');
                return $this->redirect(['action' => 'options']);
            }
            $this->Flash->error(__('Connexion impossible'));
        }
        $this->viewBuilder()->setLayout("init");
    }

    public function database() {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $db = Configure::read('Datasources');
            $db['default']['username'] = $this->request->getData('username');
            $db['default']['password'] = $this->request->getData('password');
            $db['default']['database'] = null;
            Configure::write('Datasources', $db);
            Configure::dump('app', 'default');
            if(($connection = ConnectionManager::get('default')) != null) {
                $city = Configure::consume('Init.city');
                $connection->query('CREATE DATABASE IF NOT EXISTS webmenu_'.$city);
                Configure::write('Datasources.default.database', 'webmenu_'.$city);
                Configure::dump('app', 'default');
                return $this->redirect(['action' => 'options']);
            }
            $this->Flash->error(__('Connexion impossible'));
        }
        $this->viewBuilder()->setLayout("init");
    }
}
