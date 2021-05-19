<?php


namespace Nemundo\Content\Com\Input;


use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Html\Form\Input\HiddenInput;

class ContentTypeHiddenInput extends HiddenInput
{

    public function getContent()
    {

        $parameter = new ContentTypeParameter();
        $this->name = $parameter->getParameterName();
        $this->value = $parameter->getValue();

        return parent::getContent();

    }

}