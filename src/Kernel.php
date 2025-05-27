<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function configureContainer(\Symfony\Component\DependencyInjection\ContainerBuilder $container, LoaderInterface $loader): void
    {
        $confDir = $this->getProjectDir() . '/config';

        $loader->load($confDir . '/{packages}/*.yaml', 'glob');
        $loader->load($confDir . '/{packages}/' . $this->environment . '/*.yaml', 'glob');
        $loader->load($confDir . '/services.yaml');

        $servicesEnvFile = $confDir . '/services_' . $this->environment . '.yaml';
        if (file_exists($servicesEnvFile)) {
            $loader->load($servicesEnvFile);
        }
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $confDir = $this->getProjectDir() . '/config';

        $routes->import($confDir . '/{routes}/*.yaml', 'glob');
        $routes->import($confDir . '/{routes}/' . $this->environment . '/*.yaml', 'glob');
    }
}
