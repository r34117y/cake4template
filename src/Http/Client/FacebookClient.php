<?php


namespace App\Http\Client;


use Cake\Core\Configure;
use Facebook\Facebook;

class FacebookClient
{
    public static function get() : Facebook
    {
        return new Facebook([
            'app_id' => Configure::read('Facebook.appId'),
            'app_secret' => Configure::read('Facebook.appSecret'),
            'graph_api_version' => Configure::read('Facebook.graphApiVersion'),
        ]);
    }
}
