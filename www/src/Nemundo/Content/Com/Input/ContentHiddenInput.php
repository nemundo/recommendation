<?php


namespace Nemundo\Content\Com\Input;


use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Html\Form\Input\HiddenInput;

class ContentHiddenInput extends HiddenInput
{

    public function getContent()
    {

        $parameter = new ContentParameter();
        $this->name = $parameter->getParameterName();
        $this->value = $parameter->getValue();

        return parent::getContent();

    }

}