<?php

/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this file,
 * You can obtain one at http://mozilla.org/MPL/2.0/. */


use Silex\Application;
use Silex\ServiceProviderInterface;

include "vendor/mercadopago/sdk/lib/mercadopago.php";



class MPServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
    	$app['mp'] = $app->share(function () use ($app) {
    		$mp = new MP($app['id_client'],$app['id_client_secret']);
    		$mp->sandbox_mode(TRUE);
    		return $mp;

        });
    }

    public function boot(Application $app)
    {
    }
}
