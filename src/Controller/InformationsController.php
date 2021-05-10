<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;


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

    public function index()
    {
        $information = Configure::read('Options');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $logo = $this->request->getData('logo');
            $theme = $this->request->getData('theme');
            $newlogo = $information['logo'];
            $newtheme = $information['theme'];
            if ($logo->getClientFilename() != null) {
                unlink(WWW_ROOT . 'img/'. $information['logo']);
                $logo->moveTo(WWW_ROOT . 'img/logo_'.$logo->getClientFilename());
                $newlogo = 'logo_'.$logo->getClientFilename();
            }
            
            if ($theme->getClientFilename() != null) {
                unlink(WWW_ROOT . 'img/'. $information['logo']);
                $theme->moveTo(WWW_ROOT . 'img/theme_'.$theme->getClientFilename());
                $newtheme = 'theme_'.$theme->getClientFilename();
            }
            $information = $this->request->getData();
            $information['logo'] = $newlogo;
            $information['theme'] = $newtheme;
            Configure::write('Options', $information);
            Configure::dump('options', 'options',['Options', 'Init', 'Datasources']);
            return $this->redirect(['action' => 'index']);
            $this->Flash->valid(__('Modifications sauvegardées'));
        }
        $this->set(compact('information'));
    }
}
