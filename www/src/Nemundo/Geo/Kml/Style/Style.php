<?php

namespace Nemundo\Geo\Kml\Style;


use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractTagContainer;

// KmlStyle
class Style extends AbstractTagContainer
{

    public $styleId;


    protected function loadStyle() {

    }


    public function __construct(AbstractContainer $parentContainer = null)
    {
        parent::__construct($parentContainer);
        $this->loadStyle();
    }


    public function getContent()
    {

        $this->tagName = 'Style';
        $this->addAttribute('id', $this->styleId);

        return parent::getContent();

    }

}