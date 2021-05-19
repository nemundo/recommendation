<?php

namespace Nemundo\Core\Http\Request\Post;


use Nemundo\Core\Http\Request\AbstractGetPostRequest;

abstract class AbstractPostRequest extends AbstractGetPostRequest
{

    public function getValue()
    {

        $value = $this->defaultValue;
        if ($this->existsRequest()) {
            $value = trim($_POST[$this->requestName]);
        }

        return $value;

    }


    public function existsRequest()
    {
        $value = isset($_POST[$this->requestName]);
        return $value;
    }

}