<?php

namespace Nemundo\Core\Log;


use Nemundo\Core\Base\AbstractBase;

class LogConfig extends AbstractBase
{

    /**
     * @var LogType
     */
    static public $logType = [LogType::SCREEN, LogType::FILE];

    /**
     * @var string
     */
    public static $logPath = 'log';

    /**
     * @var bool
     */
    public static $errorMessageOccurs = false;


}