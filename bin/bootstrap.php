<?php

require __DIR__.'/../vendor/autoload.php';

$paths = array("./src/Entity");
$isDevMode = true;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'host'   => 'localhost',
    'port'   => '8889',
    'user'     => 'root',
    'password'     => '121212',
    'dbname'     => $_ENV['DB_NAME'],
);

$config = \Doctrine\ORM\ORMSetup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = \Doctrine\ORM\EntityManager::create($dbParams, $config);
