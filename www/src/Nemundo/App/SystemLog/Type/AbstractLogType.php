<?php

namespace Nemundo\App\SystemLog\Type;


use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractLogType extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $logType;

    /**
     * @var string
     */
    public $id;


    abstract protected function loadLogType();

    public function __construct()
    {
        $this->loadLogType();
    }


}