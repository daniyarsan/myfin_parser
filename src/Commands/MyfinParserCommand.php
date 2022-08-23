<?php


namespace Daniyarsan\Testtask\Commands;


use Daniyarsan\Testtask\Core\Http;
use Daniyarsan\Testtask\Entity\Crypto;
use Daniyarsan\Testtask\Parsers\TableParser;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class MyfinParserCommand
 * @package Daniyarsan\Testtask\Commands
 */
class MyfinParserCommand extends Command
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    protected static $defaultName = 'app:parse-myfin';

    protected const SITE_URL = 'https://myfin.by/crypto-rates';
    protected const TABLE_SELECTOR = '.items';

    /**
     * MyfinParserCommand constructor.
     * @param EntityManagerInterface $entityManager
     * @param string|null $name
     */
    public function __construct(EntityManagerInterface $entityManager, string $name = null)
    {
        parent::__construct($name);
        $this->em = $entityManager;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /* Request to remote server */
        $http = new Http();
        $response = $http->send(self::SITE_URL, [], 'application/json');

        /* Parsing data */
        if ($response) {
            $tableParser = new TableParser($response->getRaw());
            $dataSet = $tableParser->parse(self::TABLE_SELECTOR);

            if ($dataSet) {
                foreach ($dataSet as $dataItem) {
                    $cryptoRecord = $this->em->getRepository(Crypto::class)->findBy([
                        'crypto' => $dataItem[0]
                    ]);
                    if (count($cryptoRecord) < 1) {
                        $crypto = new Crypto();
                        $crypto->setCrypto($dataItem[0]);
                        $crypto->setFiat($dataItem[1]);
                        $crypto->setPrice((floatval(str_replace('$', ' ', explode(' ', $dataItem[3])[0]))));
                        $crypto->setTime(new \DateTime('now'));
                        $this->em->persist($crypto);
                        $this->em->flush();
                    }
                }
            }

        }

        return Command::SUCCESS;

    }
}