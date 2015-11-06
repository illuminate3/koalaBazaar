<?php

/*
 * This file is part of Laravel Instagram.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Instagram Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'client_id' => '32dbb99b438945caabe6b0a8636b8acc',
            'client_secret' => '911fe9399a2441e5a5a37a56ffdfeecc',
            'callback_url' => 'http://www.koalabazaar.com/instagramcallback',
        ],

        'alternative' => [
            'client_id' => 'your-client-id',
            'client_secret' => null,
            'callback_url' => null,
        ],

    ],

];
