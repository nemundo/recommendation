<?php

namespace Nemundo\Html\Header\Meta;


class Meta extends AbstractMeta
{

    public $name;

    public $content;


    public function addAttribute($attribute, $value)
    {
        parent::addAttribute($attribute, $value);
    }

}