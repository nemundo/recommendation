<?php

namespace Nemundo\Core\Http\Request\Get;


use Nemundo\Core\Http\Request\AbstractGetPostRequest;

abstract class AbstractGetRequest extends AbstractGetPostRequest
{

    public function getValue()
    {

        $value = $this->defaultValue;
        if ($this->existsRequest()) {
            $value = trim($_GET[$this->requestName]);
        }

        return $value;

    }


    public function existsRequest()
    {
        $value = isset($_GET[$this->requestName]);
        return $value;
    }

}