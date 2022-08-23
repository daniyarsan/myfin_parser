<?php


namespace Daniyarsan\Testtask\Core;


/**
 * Class Response
 * @package Daniyarsan\Testtask\Core
 */
class Response implements ResponseInterface
{
    /**
     * @var
     */
    protected $raw;

    public function __construct($rawData)
    {
        $this->raw = $rawData;
    }

    /**
     * @return object
     */
    public function getJson(): object
    {

        // TODO: Implement getJson() method.
    }

    /**
     * @return string
     */
    public function getString(): string
    {

    }

    /**
     * @return string
     */
    public function getRaw(): string
    {
        return $this->raw;
    }

    /**
     * @param string $name
     * @return string
     */
    public function getHeader(string $name): string
    {
        return substr($this->data,9,3);
    }

}