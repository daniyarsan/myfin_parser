<?php

use MiladRahimi\PhpRouter\Router;

/* Bootstrap */
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/bin/bootstrap.php';

try {

    /* Routing */
    $router = Router::create();
    $router->getContainer()->singleton(\Doctrine\ORM\EntityManager::class, $entityManager);
    $router->get('/', [\Daniyarsan\Testtask\Controller\MainController::class, 'index']);
    $router->get('/crypto/{id}', [\Daniyarsan\Testtask\Controller\MainController::class, 'crypto']);

    $router->dispatch();
} catch (\Exception $e) {
    var_dump($e->getMessage());
    exit;
}