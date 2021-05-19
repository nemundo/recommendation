<?php

namespace Nemundo\Geo\Kml\Property;


class Snippet extends AbstractProperty
{

    public function getContent()
    {

        $this->tagName = 'Snippet';
        return parent::getContent();

    }

}