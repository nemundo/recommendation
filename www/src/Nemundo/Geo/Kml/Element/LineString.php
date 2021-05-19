<?php

namespace Nemundo\Geo\Kml\Element;


class LineString extends AbstractLineElement
{

    public function getContent()
    {

        $this->tagName = 'LineString';
        return parent::getContent();

    }

}