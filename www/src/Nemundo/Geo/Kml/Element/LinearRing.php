<?php

namespace Nemundo\Geo\Kml\Element;


class LinearRing extends AbstractLineElement
{

    public function getContent()
    {

        $this->tagName = 'LinearRing';
        return parent::getContent();

    }

}