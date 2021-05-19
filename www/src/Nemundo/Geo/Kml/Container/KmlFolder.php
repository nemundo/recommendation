<?php

namespace Nemundo\Geo\Kml\Container;


use Nemundo\Geo\Kml\Property\Name;
use Nemundo\Html\Container\AbstractTagContainer;

// KmlFolder
class KmlFolder extends AbstractTagContainer
{

    /**
     * @var string
     */
    public $label;


    public function getContent()
    {

        $this->tagName = 'Folder';

        if ($this->label !== null) {
            $name = new Name($this);
            $name->value = $this->label;
        }

        return parent::getContent();

    }

}