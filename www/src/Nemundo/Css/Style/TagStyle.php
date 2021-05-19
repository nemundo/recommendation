<?php


namespace Nemundo\Css\Style;

// HtmlTagStyle
class TagStyle extends AbstractStyle
{

    public $tag;

    public function getStyle()
    {

        $this->selector=$this->tag;
        parent::getStyle();

    }


}