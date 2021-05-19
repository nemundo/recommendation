<?php

namespace Nemundo\Core\Time;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Debug\Debug;


class Stopwatch extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $logName;

    /**
     * @var float
     */
    private $time;

    function __construct($logName = null)
    {
        $this->logName = $logName;
        $this->time = microtime(true);
    }

    // stopAndGetSecond
    public function stop()
    {

        $time = microtime(true) - $this->time;
        $time = round($time, 3);

        return $time;
    }


    public function stopAndPrintOutput()
    {
        (new Debug())->write($this->logName . ': ' . $this->stop().' sec');
    }


    public function stopAndGetMessage()
    {

        $message = $this->logName . ': ' . $this->stop().' sec';
        return $message;

    }


}
