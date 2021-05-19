<?php


namespace Nemundo\Html\Header\Meta;


class ThemeColorMeta extends AbstractMeta
{

    public $color;

    public function getContent()
    {

        $this->name = 'theme-color';
        $this->content = $this->color;

        return parent::getContent();

    }

}