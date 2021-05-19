<?php

namespace Nemundo\Geo\Kml\Property;


class StyleUrl extends AbstractProperty
{

    public function getContent()
    {

        $this->tagName = 'styleUrl';
        return parent::getContent();

    }

}