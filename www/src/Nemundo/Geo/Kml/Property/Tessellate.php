<?php

namespace Nemundo\Geo\Kml\Property;


class Tessellate extends AbstractProperty
{

    public function getContent()
    {

        $this->tagName = 'tessellate';
        return parent::getContent();

    }

}