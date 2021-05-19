<?php

namespace Nemundo\Geo\Kml\Container;


use Nemundo\Html\Container\AbstractTagContainer;

class MultiGeometry extends AbstractTagContainer
{

    public function getContent()
    {

        $this->tagName = 'MultiGeometry';
        return parent::getContent();

    }

}