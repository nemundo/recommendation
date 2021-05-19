<?php

namespace Nemundo\Geo\Kml\Property;


class RandomColorMode extends AbstractProperty
{

    public function getContent()
    {

        $this->tagName = 'colorMode';
        $this->addContent('random');

        return parent::getContent();
    }

}