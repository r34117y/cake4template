<?php


namespace App\Controller\Admin;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        $this->loadComponent('FormProtection');
    }

    public function beforeRender(EventInterface  $event)
    {
        $this->viewBuilder()->setClassName('AdminLTE.AdminLTE');
        $this->viewBuilder()->setTheme('AdminLTE');

        // Error Controller nie ładuje obiektu autentykacji
        if (isset($this->Authentication)) {
            $this->set('currentUser', $this->Authentication->getResult()->getData());
        }
    }
}
