<?php

namespace Nemundo\Dev\ProjectBuilder\Code;


use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractProjectCode extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $path;

    /**
     * @var string
     */
    public $prefixNamespace = '';


    abstract public function createCode();

}