<?php

namespace Nemundo\Core\Log;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Time\Stopwatch;

class PerformanceLog extends AbstractBaseClass
{

    /**
     * @var Stopwatch
     */
    private $stopwatch;

    private $timeLimit;

    public function __construct($timeLimit = null)
    {
        $this->timeLimit = $timeLimit;
        $this->stopwatch = new Stopwatch();
    }


    public function writeLog($message)
    {

        // $datumText = new Text((new Date())->setNow()->getIsoDateFormat());

        $time = $this->stopwatch->stop();
        $log = true;

        if ($this->timeLimit !== null) {
            if ($time < $this->timeLimit) {
                $log = false;
            }
        }


        if ($log) {

            $filename = (new LogPath())
                ->addPath('performance.log')
                ->getFilename();

            // (new Debug())->write($filename);

            /*
                        (new Path())
                        ->addPath(LogConfig::$logPath)
                        ->addPath($datumText->getValue() . '.txt')
                        ->getFilename();*/

            $message = date('Y-m-d H:i:s') . ';' . $this->stopwatch->stop() . ';' . $message;
            $file = fopen($filename, 'a');
            fwrite($file, $message . PHP_EOL);
            fclose($file);

        }

    }


}