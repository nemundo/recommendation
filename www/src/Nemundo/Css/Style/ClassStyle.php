<?php


namespace Nemundo\Css\Style;


class ClassStyle extends AbstractStyle
{

    public $className;

    public function getStyle()
    {

        $this->selector='.'. $this->className;
        parent::getStyle();

    }

}