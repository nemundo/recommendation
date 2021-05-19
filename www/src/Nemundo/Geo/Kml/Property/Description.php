<?php

namespace Nemundo\Geo\Kml\Property;


class Description extends AbstractProperty
{

    public function getContent()
    {

        $this->tagName = 'description';
        //$this->addContent($this->value);
        return parent::getContent();

    }

}