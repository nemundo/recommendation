<?php

namespace Nemundo\Core\Http\Request;


use Nemundo\Core\Base\AbstractBase;


class RequestMethod extends AbstractBase
{


    public function getRequestMethod() {

       $value= $_SERVER['REQUEST_METHOD'];
        return $value;
    }


    public function isPost() {

    }


    public function isGet() {

    }



}