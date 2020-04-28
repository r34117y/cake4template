<?php

namespace App\Authenticator;

use App\Http\Client\FacebookClient;
use App\Http\Client\GoogleClient;
use App\Model\Entity\User;
use Authentication\Authenticator\AbstractAuthenticator;
use Authentication\Authenticator\Result;
use Authentication\Authenticator\ResultInterface;
use Authentication\UrlChecker\DefaultUrlChecker;
use Cake\ORM\TableRegistry;
use Facebook\GraphNodes\GraphUser;
use Psr\Http\Message\ServerRequestInterface;

class FacebookAuthenticator extends AbstractAuthenticator
{
    /** @var GraphUser */
    private $facebookUser;

    /** @var string */
    private $facebookCode;

    protected $_defaultConfig = [
        'fields' => ['code'],
        'loginUrl' => '/login'
    ];
    public function authenticate(ServerRequestInterface $request): ResultInterface
    {
        if (! $this->_checkUrl($request)) {
            return new Result(null, Result::FAILURE_OTHER, ['Niepoprawny url logowania.']);
        }

        $this->facebookCode = $request->getQuery('code', null);

        if (! $request->is('facebookAuth')) {
            return new Result(null, Result::FAILURE_CREDENTIALS_MISSING, [
                'Brak wymaganego parametru url',
            ]);
        }

        $facebookUser = $this->getFacebookUser();

        $usersRepo = TableRegistry::getTableLocator()->get('Users');
        $user = $usersRepo->find('facebook', ['facebook' => $facebookUser])->first();

        if (! $user) {
            /** @var User $user */
            $user = $usersRepo->find('users')->andWhere(['email' => $facebookUser->getEmail()])->first();
            if (! $user) {
                $this->createFacebookUser();
            } else if (! $user->hasFacebookProfile()) {
                //todo W ten sposób przy pierwszym logowaniu AuthUser nie będzie miał przypisanego social_profile
                $this->createFacebookProfile($user);
            }
        }

        if (empty($user)) {
            return new Result(null, Result::FAILURE_IDENTITY_NOT_FOUND, $this->_identifier->getErrors());
        }

        return new Result($user, Result::SUCCESS);
    }

    protected function _checkUrl(ServerRequestInterface $request): bool
    {
        $checker = new DefaultUrlChecker();
        return $checker->check(
            $request,
            $this->getConfig('loginUrl'),
            (array)$this->getConfig('urlChecker')
        );
    }

    private function createFacebookUser()
    {
        $nameParts = explode(' ', $this->facebookUser->getName());
        $firstname = $nameParts[0];
        $lastname = $nameParts[1];
        $data = [
            'email' => $this->facebookUser->getEmail(),
            'firstname' => $firstname,
            'lastname' => $lastname,
            'social_profiles' => [
                [
                    'provider' => 'facebook',
                    'access_token' => $this->facebookCode,
                    'identifier' => $this->facebookUser->getId(),
                    'username' => $this->facebookUser->getName(),
                    'first_name' => $firstname,
                    'last_name' => $lastname,
                    'full_name' => $this->facebookUser->getName(),
                    'email' => $this->facebookUser->getEmail(),
                    'gender' => $this->facebookUser->getGender(),
                    'picture_url' => $this->facebookUser->getPicture(),
                    'email_verified' => null,
                ]
            ],
            'roles' => [['id' => User::ROLE_USER]]
        ];
        $repo = TableRegistry::getTableLocator()->get('Users');
        $user = $repo->newEntity($data, [
            'associated' => ['Roles', 'SocialProfiles']
        ]);
        if (! $repo->save($user)) {
            throw new \Exception('Nie udało się utworzyć użytkownika Google');
        }
    }

    private function getFacebookUser() : GraphUser
    {
        if (! $this->facebookUser) {
            $facebookClient = FacebookClient::get();
            $redirectHelper = $facebookClient->getRedirectLoginHelper();
            $facebookToken = $redirectHelper->getAccessToken();
            $token = $facebookToken->getValue();
            $response = $facebookClient->get('/me?fields=id,name,email', $token);
            $this->facebookUser = $response->getGraphUser();
        }

        return $this->facebookUser;
    }

    private function createFacebookProfile(User $user)
    {
        $nameParts = explode(' ', $this->facebookUser->getName());
        $firstname = $nameParts[0];
        $lastname = $nameParts[1];

        $data = [
            'user_id' => $user->id,
            'provider' => 'facebook',
            'access_token' => $this->facebookCode,
            'identifier' => $this->facebookUser->getId(),
            'username' => $this->facebookUser->getName(),
            'first_name' => $firstname,
            'last_name' => $lastname,
            'full_name' => $this->facebookUser->getName(),
            'email' => $this->facebookUser->getEmail(),
            'gender' => $this->facebookUser->getGender(),
            'picture_url' => $this->facebookUser->getPicture(),
            'email_verified' => null,
        ];
        $repo = TableRegistry::getTableLocator()->get('SocialProfiles');
        $profile = $repo->newEntity($data);
        if (! $repo->save($profile)) {
            throw new \Exception('Nie udało się utworzyć profilu użytkownika Facebook');
        }
    }
}
