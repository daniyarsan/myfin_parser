<?php


namespace Daniyarsan\Testtask\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="crypto")
 */
class Crypto
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $crypto;

    /**
     * @ORM\Column(type="string")
     */
    private $fiat;

    /**
     * @ORM\Column(type="decimal", precision=19, scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="datetime")
     */
    private $time;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCrypto()
    {
        return $this->crypto;
    }

    /**
     * @param mixed $crypto
     */
    public function setCrypto($crypto): void
    {
        $this->crypto = $crypto;
    }

    /**
     * @return mixed
     */
    public function getFiat()
    {
        return $this->fiat;
    }

    /**
     * @param mixed $fiat
     */
    public function setFiat($fiat): void
    {
        $this->fiat = $fiat;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time): void
    {
        $this->time = $time;
    }
}