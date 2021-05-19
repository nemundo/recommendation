<?php

namespace Nemundo\Geo\Kml\Property;


use Nemundo\Html\Container\AbstractTagContainer;

class AbstractProperty extends AbstractTagContainer
{

    /**
     * @var string
     */
    public $value;

    public function getContent()
    {

        $this->returnOneLine = true;
        $this->addContent($this->value);

        return parent::getContent();
    }

}