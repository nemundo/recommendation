<?php

namespace Nemundo\Core\Http\Request\Get;


class GetRequest extends AbstractGetRequest
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