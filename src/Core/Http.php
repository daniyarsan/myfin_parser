<?php

namespace Daniyarsan\Testtask\Core;

use Daniyarsan\Testtask\Core\HttpInterface;

/**
 * Class Http
 * @package Daniyarsan\Testtask\Core
 */
class Http implements HttpInterface
{
    public function __construct() {}

    /**
     * @param string $url
     * @param array $data
     * @param $contentType
     * @return Response
     */
    public function send(string $url, array $data, $contentType): Response
    {
        $urlParts = parse_url($url);

        $fp = fsockopen('ssl://'. $urlParts['host'], 443, $errno, $errstr, 30);
        fwrite($fp, "GET ".$urlParts['path']." HTTP/1.1\r\n");
        fwrite($fp, "Host: ".$urlParts['host']."\r\n");
        fwrite($fp, "Content-Type: ".$contentType."\r\n");
        fwrite($fp, "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36\r\n");
        fwrite($fp, "Connection: close\r\n");
        fwrite($fp, "\r\n");

        if (!empty($data)) {
            $content = http_build_query($data);
            fwrite($fp, "Content-Length: ".strlen($content)."\r\n");
            fwrite($fp, $content);
        }

        header('Content-type: '.$contentType);

        $raw = '';

        while (!feof($fp)) {
            $raw .= fgets($fp, 1024);
        }

        return new Response($raw);
    }

}