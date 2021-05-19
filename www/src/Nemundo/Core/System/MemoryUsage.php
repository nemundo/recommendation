<?php

namespace Nemundo\Core\System;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Type\Number\Number;

class MemoryUsage extends AbstractBase
{

    public function getByte()
    {
        $memory = memory_get_usage();
        return $memory;
    }


    public function getKB()
    {
        $memory = $this->getByte() / 1024;
        return $memory;
    }


    public function getMB()
    {
        $memory = (new Number($this->getKB() / 1024))->roundNumber();
        return $memory;
    }

    public function writeMemoryUsage()
    {
        (new Debug())->write($this->getMB() . ' MB');
    }


    public function writeMemoryPeak()
    {

        // $memory =  memory_get_peak_usage(true);


        $memory = (new Number(memory_get_peak_usage(true) / 1024 / 1024))->roundNumber();
        (new Debug())->write($memory . ' MB');


    }


}