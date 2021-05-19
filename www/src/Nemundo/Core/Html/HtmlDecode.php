<?php

namespace Nemundo\Core\Html;


use Nemundo\Core\Base\AbstractBase;

class HtmlDecode extends AbstractBase
{

    public function decodeHtml($html)
    {

        $html = html_entity_decode($html);
        return $html;

    }


    public function removeHtml($html)
    {

        $html = strip_tags($html);
        $html = html_entity_decode($html);

        // utf8

        return $html;

    }

}