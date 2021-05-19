<?php


namespace Nemundo\Css\Style;


class ElementStyle extends AbstractStyle
{


    public $elementId;

    public function getStyle()
    {

        $this->selector='#'.$this->elementId;
        parent::getStyle();

    }


}