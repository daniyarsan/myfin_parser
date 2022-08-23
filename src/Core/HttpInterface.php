<?php

namespace Daniyarsan\Testtask\Core;

interface HttpInterface
{

    /**
     * @param string $url
     * @param array $data
     * @param $contentType
     * @return ResponseInterface
     */
    public function send(string $url, array $data, $contentType): ResponseInterface;
}