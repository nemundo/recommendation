<?php

namespace Nemundo\Geo\Kml\Container;


use Nemundo\Html\Container\AbstractTagContainer;

class Document extends AbstractTagContainer
{

    public function getContent()
    {

        $this->tagName = 'Document';
        return parent::getContent();

    }

}