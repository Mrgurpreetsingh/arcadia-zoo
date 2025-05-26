<?php

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->import(
        resource: '../../src/Controller/Admin/',
        type: 'attribute'
    )
    ->prefix('/admin');
};
