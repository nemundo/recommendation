<?php

namespace Nemundo\Core\Url;


use Nemundo\Core\Base\AbstractBase;

class UrlConverter extends AbstractBase
{


    public function convertToUrl($text)
    {

        //$text = strtolower($text);
        $text = mb_strtolower($text);

        $text = str_replace('ü', 'ue', $text);
        $text = str_replace('ä', 'ae', $text);
        $text = str_replace('ö', 'oe', $text);
        $text = str_replace('ö', 'oe', $text);
        $text = str_replace('ö', 'oe', $text);
        $text = str_replace('é', 'e', $text);
        $text = str_replace('è', 'e', $text);
        $text = str_replace('á', 'a', $text);
        $text = str_replace('à', 'a', $text);
        $text = str_replace('â', 'a', $text);
        $text = str_replace('ß', 'ss', $text);
        $text = str_replace('ç', 'c', $text);

        $text = str_replace(' ', '-', $text);
        $text = str_replace('/', '-', $text);
        $text = str_replace('?', '', $text);
        $text = str_replace('«', '', $text);
        $text = str_replace('»', '', $text);
        $text = str_replace('=', '', $text);
        $text = str_replace('<', '', $text);
        $text = str_replace('>', '', $text);
        $text = str_replace('&', '', $text);
        $text = str_replace('.', '', $text);
        $text = str_replace(',', '', $text);
        $text = str_replace('(', '', $text);
        $text = str_replace(')', '', $text);
        $text = str_replace(':', '', $text);
        $text = str_replace(';', '', $text);
        $text = str_replace('!', '', $text);
        $text = str_replace('[', '', $text);
        $text = str_replace(']', '', $text);
        $text = str_replace('/', '', $text);
        $text = str_replace('\\', '', $text);
        $text = str_replace('"', '', $text);
        $text = str_replace('\'', '', $text);

        // replace none ascii between ...



        return $text;

    }

}