<?php

namespace Nemundo\Core\Http\Request\Post;


class PostRequest extends AbstractPostRequest
{

    public function __construct($requestName)
    {
        parent::__construct();
        $this->requestName = $requestName;

    }


    protected function loadRequest()
    {

    }

}