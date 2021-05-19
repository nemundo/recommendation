<?php

namespace Nemundo\Core\Http\Response;


use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractResponse extends AbstractBaseClass
{

    /**
     * @var StatusCode
     */
    public $statusCode = StatusCode::OK;

    abstract public function sendResponse();


    protected function sendStatusCode()
    {
        http_response_code($this->statusCode);
    }

}