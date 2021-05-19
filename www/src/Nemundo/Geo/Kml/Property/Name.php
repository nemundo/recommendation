<?php

namespace Nemundo\Geo\Kml\Property;

class Name extends AbstractProperty
{

    public function getContent()
    {

        $this->tagName = 'name';
        return parent::getContent();

    }

}