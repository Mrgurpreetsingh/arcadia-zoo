<?php

require dirname(__DIR__).'/vendor/autoload.php';

use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;

$factory = new PasswordHasherFactory([
    'common' => ['algorithm' => 'auto'],
]);
$hasher = $factory->getPasswordHasher('common');

$password = 'Admin2025!';
$hash = '$2y$13$VoP0/pqVc4p83hHClpmVlOXrDLPMU2p8M/dww7aYLXmqG2YwOufBC';

if ($hasher->verify($hash, $password)) {
    echo "Mot de passe correct !\n";
} else {
    echo "Mot de passe incorrect.\n";
}