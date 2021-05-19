<?php

namespace Nemundo\Com\FormBuilder\UrlReferer;


use Nemundo\Core\Http\Request\Post\AbstractPostRequest;

class UrlRefererRequest extends AbstractPostRequest
{

    protected function loadRequest()
    {

        $this->requestName = 'url_referer';

    }

}