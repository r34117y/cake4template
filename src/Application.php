<?php
declare(strict_types=1);

namespace App;

use App\Authenticator\FacebookAuthenticator;
use App\Authenticator\GoogleAuthenticator;
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Authentication\Middleware\AuthenticationMiddleware;
use Authorization\AuthorizationService;
use Authorization\AuthorizationServiceProviderInterface;
use Authorization\Middleware\AuthorizationMiddleware;
use Authorization\Policy\OrmResolver;
use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Http\MiddlewareQueue;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;
use Psr\Http\Message\ServerRequestInterface;

/**
 * - rejsetruje middleware
 * - robi bootstrap całej aplikacji
 */
class Application extends BaseApplication implements AuthenticationServiceProviderInterface
{
    /**
     * Load all the application configuration and bootstrap logic.
     *
     * @return void
     */
    public function bootstrap(): void
    {
        // Call parent to load bootstrap from files.
        parent::bootstrap();

        if (PHP_SAPI === 'cli') {
            $this->bootstrapCli();
        }

        if (Configure::read('debug')) {
            $this->addPlugin('DebugKit');
        }

        // Tutaj wszystkie doinstalowane pluginy
        $this->addPlugin('Authorization');
        $this->addPlugin('Authentication');
        $this->addPlugin('AdminLTE');
    }

    /**
     * Rejestruje middleware używany w aplikacji
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to setup.
     * @return \Cake\Http\MiddlewareQueue The updated middleware queue.
     */
    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        $middlewareQueue
            // Error handler na samej górze, żeby obsłużyć błędy rzycane w pozostałych warstwach
            ->add(new ErrorHandlerMiddleware(Configure::read('Error')))

            // Obsługa assetów
            ->add(new AssetMiddleware([
                'cacheTime' => Configure::read('Asset.cacheTime'),
            ]))

            // Jeśli chcesz cachować ścieżki należy podać drugi argument do konstruktora:
            // `new RoutingMiddleware($this, '_cake_routes_')`
            ->add(new RoutingMiddleware($this))
            //https://book.cakephp.org/authorization/2/en/index.html
            //->add(new AuthorizationMiddleware($this));
            ->add( new AuthenticationMiddleware($this));

        return $middlewareQueue;
    }

    /**
     * Bootstrap środowisko konsolowego
     *
     * @return void
     */
    protected function bootstrapCli(): void
    {
        try {
            $this->addPlugin('Bake');
        } catch (MissingPluginException $e) {
            // Nie rób nic, jeśli nie ma pluginu
        }

        $this->addPlugin('Migrations');

        // Tutaj pozostałe pluginy dla CLI
    }

    /**
     * Returns a service provider instance.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request Request
     * @return \Authentication\AuthenticationServiceInterface
     */
    public function getAuthenticationService(ServerRequestInterface $request): AuthenticationServiceInterface
    {
        $service = new AuthenticationService();
        $service->setConfig([
            'unauthenticatedRedirect' => '/login',
            'queryParam' => 'redirect',
        ]);

        $fields = [
            'username' => 'email',
            'password' => 'password'
        ];

        // Załaduj autentykatory
        // Sesja musi być pierwsza, żeby była poprawnie obsługiwana
        $service->loadAuthenticator('Authentication.Session');
        $service->loadAuthenticator('Authentication.Form', [
            'fields' => $fields,
            'loginUrl' => '/login'
        ]);
        $service->loadAuthenticator(GoogleAuthenticator::class);
        $service->loadAuthenticator(FacebookAuthenticator::class);

        $service->loadIdentifier('Authentication.Password', [
            'fields' => $fields,
            'resolver' => [
                'className' => 'Authentication.Orm', // domyślny resolver
                'finder' => 'users'
            ]
        ]);

        /**
         * Identifier dla logowania Google
         */
        $service->loadIdentifier('Authentication.Token', [
            'tokenField' => 'identifier', // kolumna w bazie
            'dataField' => 'code', // nazwa w requeście
            'resolver' => [
                'className' => 'Authentication.Orm',
                'finder' => 'google'
            ]
        ]);

        return $service;
    }
}
