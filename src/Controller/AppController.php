<?php
declare(strict_types=1);

namespace App\Controller;

use App\Locale\LocaleSetter;
use App\Model\Entity\User;
use Authentication\Authenticator\Result;
use Authentication\Controller\Component\AuthenticationComponent;
use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\I18n\I18n;

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

        /** @noinspection PhpParamsInspection */
        LocaleSetter::set($this->Authentication->getResult()->getData(), $this->request);
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
