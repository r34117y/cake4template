<?php


namespace App\Controller;


use App\Http\Client\FacebookClient;
use App\Http\Client\GoogleClient;
use Cake\Core\Configure;
use Google_Client;

class AuthController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['login']);
    }

    public function login()
    {
        $queryData = $this->request->getQuery();
        if (isset($queryData['code'])) {
            //code, scope, authuser, prompt
            //$this->performGoogleLogin();
        }
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/';
            return $this->redirect($target);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Nieprawidłowa nazwa użytkownika lub hasło'));
        }
        if (Configure::read('App.enableSocialLogin')) {
            $this->createSocialLinks();
        }
        $this->viewBuilder()->setLayout('login');
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Auth', 'action' => 'login']);
    }

    private function createSocialLinks()
    {
        $googleClient = GoogleClient::get();
        $this->set('googleLink', $googleClient->createAuthUrl());

        $facebookClient = FacebookClient::get();
        $helper = $facebookClient->getRedirectLoginHelper();
        $callbackUrl = Configure::read('Facebook.callbackUrl');
        $permissions = Configure::read('Facebook.permissions');
        $loginUrl = $helper->getLoginUrl($callbackUrl, $permissions);
        $this->set('facebookLink', $loginUrl);
    }
}
