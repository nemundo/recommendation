<?php

namespace Nemundo\Com\FormBuilder\UrlReferer;


use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Html\Form\Input\HiddenInput;

class UrlRefererHiddenInput extends HiddenInput
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $request = new UrlRefererRequest();
        $this->name = $request->getRequestName();
        if ($request->hasValue()) {
            $this->value = $request->getValue();
        } else {
            $this->value = (new UrlReferer())->getUrl();
        }

    }

}