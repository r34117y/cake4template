<?php

namespace App\Locale;

use App\Model\Entity\User;
use Authentication\Authenticator\Result;
use Cake\Http\ServerRequest;
use Cake\I18n\I18n;

class LocaleSetter
{
    public static function set(?User $user, ServerRequest $request) : void
    {
        if ($user) {
            I18n::setLocale($user->default_locale);
        } else if ($cookieLocale = $request->getCookie('xonelocale')) {
            I18n::setLocale($cookieLocale);
        } else {
            $headersLocale = self::makeLocaleFromHeader($request->acceptLanguage()[0]);
            I18n::setLocale($headersLocale);
            setcookie('xonelocale', $headersLocale);
        }
    }

    /**
     * Możliwe wartości w stylu:
     * - en-en
     * - en
     */
    private static function makeLocaleFromHeader(string $accepts)
    {
        $parts = explode('-', $accepts);

        if (count($parts) === 2) {
            return $parts[0] . '_' . strtoupper($parts[1]);
        } else {
            return $parts[0] . '_' . strtoupper($parts[0]);
        }
    }
}
