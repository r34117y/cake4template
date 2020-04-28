<?php

namespace App\Authenticator;

use App\Http\Client\GoogleClient;
use App\Model\Entity\Role;
use App\Model\Entity\User;
use Authentication\Authenticator\Result;
use Authentication\Authenticator\ResultInterface;
use Authentication\UrlChecker\DefaultUrlChecker;
use Cake\ORM\TableRegistry;
use Google_Service_Oauth2;
use Psr\Http\Message\ServerRequestInterface;

class GoogleAuthenticator extends \Authentication\Authenticator\AbstractAuthenticator
{
    /** @var array */
    private $googleUser;

    /** @var string */
    private $googleCode;

    protected $_defaultConfig = [
        'fields' => ['code'],
        'loginUrl' => '/login'
    ];
    public function authenticate(ServerRequestInterface $request): ResultInterface
    {
        if (! $this->_checkUrl($request)) {
            return new Result(null, Result::FAILURE_OTHER, ['Niepoprawny url logowania.']);
        }

        $this->googleCode = $request->getQuery('code', null);

        if (! $request->is('googleAuth')) {
            return new Result(null, Result::FAILURE_CREDENTIALS_MISSING, [
                'Brak wymaganego parametru url',
            ]);
        }

        $googleUser = $this->getGoogleUser();

        $usersRepo = TableRegistry::getTableLocator()->get('Users');
        $user = $usersRepo->find('google', ['google' => $googleUser])->first();

        if (! $user) {
            /** @var User $user */
            $user = $usersRepo->find('users')->andWhere(['email' => $googleUser['email']])->first();
            if (! $user) {
                $this->createGoogleUser();
            } else if (! $user->hasGoogleProfile()) {
                //todo W ten sposób przy pierwszym logowaniu AuthUser nie będzie miał przypisanego social_profile
                $this->createGoogleProfile($user);
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

    private function createGoogleUser()
    {
        $data = [
            'email' => $this->googleUser['email'],
            'firstname' => $this->googleUser['givenName'],
            'lastname' => $this->googleUser['familyName'],
            'social_profiles' => [
                [
                    'provider' => 'google',
                    'access_token' => $this->googleCode,
                    'identifier' => $this->googleUser['id'],
                    'username' => $this->googleUser['name'],
                    'first_name' => $this->googleUser['givenName'],
                    'last_name' => $this->googleUser['familyName'],
                    'full_name' => $this->googleUser['name'],
                    'email' => $this->googleUser['email'],
                    'gender' => $this->googleUser['gender'],
                    'picture_url' => $this->googleUser['picture'],
                    'email_verified' => $this->googleUser['verifiedEmail'],
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

    private function getGoogleUser() : array
    {
        if (! $this->googleUser) {
            $googleClient = GoogleClient::get();
            $token = $googleClient->fetchAccessTokenWithAuthCode($this->googleCode);
            $googleClient->setAccessToken($token);
            $service = new Google_Service_Oauth2($googleClient);
            $googleUser = $service->userinfo->get();
            $this->googleUser = (array) $googleUser;
        }

        return $this->googleUser;
    }

    private function createGoogleProfile(User $user)
    {
        $data = [
            'user_id' => $user->id,
            'provider' => 'google',
            'access_token' => $this->googleCode,
            'identifier' => $this->googleUser['id'],
            'username' => $this->googleUser['name'],
            'first_name' => $this->googleUser['givenName'],
            'last_name' => $this->googleUser['familyName'],
            'full_name' => $this->googleUser['name'],
            'email' => $this->googleUser['email'],
            'gender' => $this->googleUser['gender'],
            'picture_url' => $this->googleUser['picture'],
            'email_verified' => $this->googleUser['verifiedEmail'],
        ];
        $repo = TableRegistry::getTableLocator()->get('SocialProfiles');
        $profile = $repo->newEntity($data);
        $repo->save($profile);
    }
}
