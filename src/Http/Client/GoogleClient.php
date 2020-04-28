<?php

namespace App\Http\Client;

use Cake\Core\Configure;
use Google_Client;

class GoogleClient
{
    public static function get() : Google_Client
    {
        $client = new Google_Client();
        $client->setClientId(Configure::read('Google.clientId'));
        $client->setClientSecret(Configure::read('Google.clientSecret'));
        $client->setRedirectUri(Configure::read('Google.redirectUri'));
        $client->setPrompt(Configure::read('Google.prompt'));

        foreach (Configure::read('Google.scope') as $scope) {
            $client->addScope($scope);
        }

        return $client;
    }
}
