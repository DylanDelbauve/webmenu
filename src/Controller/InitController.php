<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Migrations\Migrations;
use Cake\ORM\TableRegistry;
use Authentication\PasswordHasher\DefaultPasswordHasher;

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
        if (Configure::read('Init.final') == true) {
            return $this->redirect(['controller' => 'Menus', 'action' => 'index']);
        }
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
        if (Configure::read('Init.final') == true) {
            return $this->redirect(['controller' => 'Menus', 'action' => 'index']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $logo = $this->request->getData('logo');
            $theme = $this->request->getData('theme');

            if ($logo->getClientFilename() != null) {
                $logo->moveTo(WWW_ROOT . 'img/logo_'.$logo->getClientFilename());
                $newlogo = 'logo_'.$logo->getClientFilename();
            }
            
            if ($theme->getClientFilename() != null) {
                $theme->moveTo(WWW_ROOT . 'img/theme_'.$theme->getClientFilename());
                $newtheme = 'theme_'.$theme->getClientFilename();
            }
            $information = $this->request->getData();
            $information['logo'] = $newlogo;
            $information['theme'] = $newtheme;
            $information['font'] = 'Arial, sans-serif';
            $information['color'] = '#000000';
            Configure::write('Options', $information);
            Configure::write('Init.final', true);
            Configure::dump('options', 'options',['Options', 'Init', 'Datasources']);
            return $this->redirect(['controller' => 'Menus', 'action' => 'index']);
            $this->Flash->valid(__('Modifications sauvegardées'));
            
        }
        $this->viewBuilder()->setLayout("init");
    }

    public function database() {
        if (Configure::read('Init.final') == true) {
            return $this->redirect(['controller' => 'Menus', 'action' => 'index']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $db = Configure::read('Datasources');
            $db['default']['username'] = $this->request->getData('username');
            $db['default']['password'] = $this->request->getData('password');
            $db['default']['host'] = $this->request->getData('ip');
            $db['default']['database'] = null;
            $db['default']['className'] = 'Cake\Database\Connection';
            $db['default']['driver'] = 'Cake\Database\Driver\Mysql';
            $db['default']['persistent'] = false;
            $db['default']['timezone'] = 'UTC';
            $db['default']['encoding'] = 'utf8mb4';
            Configure::write('Datasources', $db);
            Configure::dump('options', 'options', ['Options', 'Init', 'Datasources']);
            ConnectionManager::drop('default');
            ConnectionManager::setConfig(Configure::read('Datasources'));
            if(($connection = ConnectionManager::get('default')) != null) {
                $init = Configure::read('Init');
                $connection->query('CREATE DATABASE IF NOT EXISTS webmenu_'.$init['city']);
                Configure::write('Datasources.default.database', 'webmenu_'.$init['city']);
                Configure::dump('options', 'options', ['Options', 'Datasources']);
                ConnectionManager::drop('default');
                ConnectionManager::setConfig(Configure::read('Datasources'));
                $migration = new Migrations();
                $migration->migrate();
                $users = TableRegistry::getTableLocator()->get('Users');
                $admin = $users->newEmptyEntity();
                $admin->name = 'admin';
                $admin->email = $init['city'].'@webmenu.com';
                $hasher = new DefaultPasswordHasher();
                $admin->password = $hasher->hash($init['password']);
                $users->save($admin);
                $dishtypes = TableRegistry::getTableLocator()->get('DishTypes');
                $dishtype = $dishtypes->newEmptyEntity();
                $dishtype->name = 'Entrée';
                $dishtypes->save($dishtype);
                $dishtype = $dishtypes->newEmptyEntity();
                $dishtype->name = 'Plat';
                $dishtypes->save($dishtype);
                $dishtype = $dishtypes->newEmptyEntity();
                $dishtype->name = 'Dessert';
                $dishtypes->save($dishtype);
                return $this->redirect(['action' => 'options']);
            }
            $this->Flash->error(__('Connexion impossible'));
        }
        $this->viewBuilder()->setLayout("init");
    }
}
