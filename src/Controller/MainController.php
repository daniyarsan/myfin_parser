<?php


namespace Daniyarsan\Testtask\Controller;


use Daniyarsan\Testtask\Entity\Crypto;
use Doctrine\ORM\EntityManager;
use Laminas\Diactoros\Response\JsonResponse;
use MiladRahimi\PhpContainer\Container;

/**
 * Class MainController
 * @package Daniyarsan\Testtask\Controller
 */
class MainController
{

    /**
     * @param Container $container
     * @return JsonResponse
     */
    public function index(Container $container)
    {
        $em = $container->get(EntityManager::class);

        $response = [
            'status' => false,
            'data' => false,
        ];

        $entityNormalized = $em->createQueryBuilder()->select('c')
            ->from(Crypto::class, 'c')
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

        if ($entityNormalized) {
            $response['status'] = true;
            $response['data'] = $entityNormalized;
        }

        return new JsonResponse($response);
    }

    /**
     * @param Container $container
     * @return JsonResponse
     */
    public function crypto(Container $container)
    {
        $em = $container->get(EntityManager::class);

        $response = [
            'status' => false,
            'data' => false,
        ];

        $entityNormalized = $em->createQueryBuilder()->select('c')
            ->from(Crypto::class, 'c')
            ->where('c.id= :id')
            ->setParameter('id', 1)
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

        if ($entityNormalized) {
            $response['status'] = true;
            $response['data'] = $entityNormalized;
        }

        return new JsonResponse($response);
    }
}