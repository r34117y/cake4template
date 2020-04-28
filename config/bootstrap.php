<?php
declare(strict_types=1);

/*
 * Konfiguracja wszelkich ścieżek
 */
require __DIR__ . '/paths.php';

/*
 * Bootstrap CakePHP.
 *
 * - Rejestracja autoloadera
 * - Konfiguracja pozostałych ścieżek
 */
require CORE_PATH . 'config' . DS . 'bootstrap.php';

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Datasource\ConnectionManager;
use Cake\Error\ConsoleErrorHandler;
use Cake\Error\ErrorHandler;
use Cake\Http\ServerRequest;
use Cake\Log\Log;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Routing\Router;
use Cake\Utility\Security;

/*
 * Sprawdź https://github.com/josegonzalez/php-dotenv żeby poznać szczegóły.
 *
 * Poniższy blok powinien być odkomentowany, jeśli chcesz używać pliku 'config/.env'
 * w środowisku deweloperskim.
 *
 * Plik ma umożliwić emulację zmiennych środowiskowych wymaganych w niektórych
 * środowiskach produkcyjnych (np. Heroku).
 *
 * Plik .env nie powinien znaleźć się w repozytorium
 * (zobacz https://github.com/josegonzalez/php-dotenv#general-security-information)
 *
*/
if (!env('APP_NAME') && file_exists(CONFIG . '.env')) {
    $dotenv = new \josegonzalez\Dotenv\Loader([CONFIG . '.env']);
    $dotenv->parse()
        ->putenv()
        ->toEnv()
        ->toServer();
}

/*
 * Utwórz instancję konfiguracji i załaduj do niej dane z pliku app.php
 *
 * Dobrym zwyczajem jest oddzielenie konfiguracji zależnych od środowiska
 * od tych które są niezależne (por. 'app' i 'app_local')
 *
 * Plik app_local nie powienien znaleźć się w repozytorium.
 */
try {
    Configure::config('default', new PhpConfig());
    Configure::load('app', 'default', false);
    Configure::load('app_local', 'default');
    Configure::load('adminlte', 'default');
    if (Configure::read('App.enableSocialLogin')) {
        Configure::load('social_login', 'default');
    }
} catch (\Exception $e) {
    exit($e->getMessage() . "\n");
}

/*
 * W środowisku deweloperskim cache powinien często się aktualizować.
 */
if (Configure::read('debug')) {
    Configure::write('Cache._cake_model_.duration', '+2 minutes');
    Configure::write('Cache._cake_core_.duration', '+2 minutes');
    // nie cachuj ścieżek
    Configure::write('Cache._cake_routes_.duration', '+2 seconds');
}

/*
 * Zalecane jest użycie UTC (ułatwia obliczanie i konwersję dat)
 * http://php.net/manual/en/timezones.php - lista dopuszczalnych wartości
 */
date_default_timezone_set(Configure::read('App.defaultTimezone'));

/*
 * Skonfiguruj rozszerzenie mbstring
 */
mb_internal_encoding(Configure::read('App.encoding'));

/**
 * Domyślna lokalizacja determinuje:
 * - format wyświetlania dat, liczb i walut
 * - domyślny język aplikacji (istotne przy tłumaczeniach)
 */
ini_set('intl.default_locale', Configure::read('App.defaultLocale'));

/**
 * Zarejestruj obsługę błędów.
 * Jeśli aplikacja działa w konsoli, załaduj dodatkowy bootstrap.
 */
if (PHP_SAPI === 'cli') {
    (new ConsoleErrorHandler(Configure::read('Error')))->register();
    require __DIR__ . '/bootstrap_cli.php';
} else {
    (new ErrorHandler(Configure::read('Error')))->register();
}

/**
 * Ustaw domyślny pełny url
 */
$fullBaseUrl = Configure::read('App.fullBaseUrl');

if (!$fullBaseUrl) {
    $s = null;
    if (env('HTTPS')) {
        $s = 's';
    }

    $httpHost = env('HTTP_HOST');
    if (isset($httpHost)) {
        $fullBaseUrl = 'http' . $s . '://' . $httpHost;
    }
    unset($httpHost, $s);
}
if ($fullBaseUrl) {
    Router::fullBaseUrl($fullBaseUrl);
}
unset($fullBaseUrl);

Cache::setConfig(Configure::consume('Cache'));
ConnectionManager::setConfig(Configure::consume('Datasources'));
TransportFactory::setConfig(Configure::consume('EmailTransport'));
Mailer::setConfig(Configure::consume('Email'));
Log::setConfig(Configure::consume('Log'));
Security::setSalt(Configure::consume('Security.salt'));

/**
 * Detektory urządzeń mobilnych i tabletów
 * Wszystkie dodane detektory można weryfikować w kontrolerach na dwa sposoby:
 * - $this->request->is('mobile')
 * - $this->request->isMobile()
 **/
ServerRequest::addDetector('mobile', function ($request) {
    $detector = new \Detection\MobileDetect();
    return $detector->isMobile();
});
ServerRequest::addDetector('tablet', function ($request) {
    $detector = new \Detection\MobileDetect();
    return $detector->isTablet();
});
if (Configure::read('App.enableSocialLogin')) {
    ServerRequest::addDetector('googleAuth', function (ServerRequest $request) {
        $query = $request->getQuery();
        return isset($query['code']) &&
            isset($query['scope']) &&
            isset($query['prompt']) &&
            isset($query['authuser']);
    });
    ServerRequest::addDetector('facebookAuth', function (ServerRequest $request) {
        $query = $request->getQuery();
        return isset($query['code']) && isset($query['state']);
    });
}

/**
 * Domyślnie Cake4 używa niemutowalnych typów danych dla obiektów Date i Time.
 * Można odkomentować poniższe linie, żeby używać typów mutowalnych.
 *
 * Można wywołać metodę `useLocaleParser()` żeby włączyć parsowanie
 * formatu zależnego od lekalizacji. Zobacz:
 * @link https://book.cakephp.org/4/en/core-libraries/internationalization-and-localization.html#parsing-localized-datetime-data
 **/
// TypeFactory::build('time')
//    ->useMutable();
// TypeFactory::build('date')
//    ->useMutable();
// TypeFactory::build('datetime')
//    ->useMutable();
// TypeFactory::build('timestamp')
//    ->useMutable();
// TypeFactory::build('datetimefractional')
//    ->useMutable();
// TypeFactory::build('timestampfractional')
//    ->useMutable();
// TypeFactory::build('datetimetimezone')
//    ->useMutable();
// TypeFactory::build('timestamptimezone')
//    ->useMutable();

/**
 * Tu można zdefiniować nietypowe reguły dla Inflectora
 * (odpowiada za tworzenie nazw modelów, szablonów itp.)
 */
//Inflector::rules('plural', ['/^(inflect)or$/i' => '\1ables']);
//Inflector::rules('irregular', ['red' => 'redlings']);
//Inflector::rules('uninflected', ['dontinflectme']);
//Inflector::rules('transliteration', ['/å/' => 'aa']);
