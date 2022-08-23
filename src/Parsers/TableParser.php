<?php


namespace Daniyarsan\Testtask\Parsers;


use PHPHtmlParser\Dom;

/**
 * Class TableParser
 * @package Daniyarsan\Testtask\Parsers
 */
class TableParser extends AbstractParser
{

    /**
     * @param $selector
     * @return array
     * @throws \PHPHtmlParser\Exceptions\ChildNotFoundException
     * @throws \PHPHtmlParser\Exceptions\NotLoadedException
     */
    public function parse($selector)
    {
        $result = [];
        $rows = $this->reader->find($selector . ' tbody tr');
        foreach ($rows as $row) {
             $result[] = $this->nodeToArray($row->find('td'));
        }

        return $result;
    }

    /**
     * @param Dom\Node\Collection $nodeCollection
     * @return array|null
     */
    private function nodeToArray(Dom\Node\Collection $nodeCollection): ?array
    {
        $result = [];

        foreach ($nodeCollection as $node) {
            $result[] = $node->find('.names .s-bold')[0] ? $node->find('.names .s-bold')[0]->innertext : null;
            $result[] = $node->find('.names .crypto_iname')[0] ? $node->find('.names .crypto_iname')[0]->innertext : null;
            $result[] = $node->innerText;

        }

        /* Clean null before return */
        return array_values(array_map(function($item) {
            return trim($item);
        }, array_filter($result, function($item) {
            return !empty($item);
        })));
    }
}