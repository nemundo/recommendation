<?php

namespace Nemundo\Core\Http\Request;

use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractRequest extends AbstractBaseClass
{

    /**
     * @var string
     */
    protected $requestName;


    abstract protected function loadRequest();

    public function __construct()
    {
        $this->loadRequest();
    }


    /*public function notExists()
    {

        $returnValue = !$this->exists();
        return $returnValue;

    }*/


    public function getRequestName()
    {
        return $this->requestName;
    }

}