<?php

require __DIR__.'/../vendor/autoload.php';

$paths = array("./src/Entity");
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'daniyarsan123',
    'dbname'   => 'testtask',
);

$config = \Doctrine\ORM\ORMSetup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = \Doctrine\ORM\EntityManager::create($dbParams, $config);
