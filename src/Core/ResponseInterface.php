<?php

namespace Daniyarsan\Testtask\Core;

/**
 * Interface ResponseInterface
 * @package Daniyarsan\Testtask\Core
 */
interface ResponseInterface
{

    /**
     * @return object
     */
    public function getJson(): object;

    /**
     * @return string
     */
    public function getString(): string;

    /**
     * @return string
     */
    public function getRaw(): string;

    /**
     * @param string $name
     * @return string
     */
    public function getHeader(string $name): string;

}