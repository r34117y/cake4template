<?php
declare(strict_types=1);

namespace App\Controller;

use Authentication\Controller\Component\AuthenticationComponent;
use Cake\Controller\Controller;
use Cake\Event\EventInterface;

/**
 * @property AuthenticationComponent $Authentication
 */
class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        //$this->loadComponent('Authorization.Authorization');
        $this->loadComponent('Authentication.Authentication');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
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
