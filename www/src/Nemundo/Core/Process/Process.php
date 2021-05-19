<?php

namespace Nemundo\Core\Process;


use Nemundo\Core\Base\AbstractBase;

class Process extends AbstractBase
{

    /**
     * @var string
     */
    public $command;

    /**
     * @var
     */
    public $outputFilename = '/dev/null';


    public function run()
    {

        $pid = exec($this->command . ' > ' . $this->outputFilename);


        /*
        echo 'pid: ' . $pid;
        if (posix_getpgid($pid)) {
            echo 'process is running';
        }*/


        return $pid;

    }





}