<?php


namespace Daniyarsan\Testtask\Parsers;


use PHPHtmlParser\Dom;

abstract class AbstractParser
{
    /**
     * @var Dom
     */
    protected $reader;

    /**
     * AbstractParser constructor.
     * @param string $rawHtml
     * @throws \PHPHtmlParser\Exceptions\ChildNotFoundException
     * @throws \PHPHtmlParser\Exceptions\CircularException
     * @throws \PHPHtmlParser\Exceptions\ContentLengthException
     * @throws \PHPHtmlParser\Exceptions\LogicalException
     * @throws \PHPHtmlParser\Exceptions\StrictException
     */
    public function __construct(string $rawHtml)
    {
        $this->reader = new Dom();
        $this->reader->loadStr($rawHtml);
    }

    /**
     * @param $selector
     * @return mixed
     */
    abstract public function parse($selector);
}