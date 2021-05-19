<?php

namespace Nemundo\Core\Base;


abstract class AbstractDataLoadObject extends AbstractBaseClass
{


    abstract protected function loadData();


    public function __construct()
    {
        $this->loadData();
    }

}