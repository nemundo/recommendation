<?php

namespace Nemundo\Com\FormBuilder\Item;


use Nemundo\Core\Http\Request\Post\PostRequest;
use Nemundo\Html\Form\Input\HiddenInput;
use Nemundo\Web\Parameter\UrlParameter;


class HiddenFormItem extends HiddenInput
{


    public function getPostValue() {


        $parameter = new PostRequest($this->name);
        $value = $parameter->getValue();

        return $value;

    }

    // Funktioniert nicht bei $_POST !!!

    public function getValue()
    {

        $parameter = new UrlParameter();
        $parameter->parameterName = $this->name;
        $value = $parameter->getValue();

        return $value;

    }


    public function hasValue() {

        $parameter = new UrlParameter();
        $parameter->parameterName = $this->name;
        $value = $parameter->hasValue();

        return $value;

    }

}