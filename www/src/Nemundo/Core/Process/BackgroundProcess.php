<?php

namespace Nemundo\Core\Process;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\System\OperatingSystem;

class BackgroundProcess extends Process
{


    public function run()
    {


        $os = new OperatingSystem();


        $status = false;
        $pid = null;
        if ($os->isLinux()) {
            $pid = exec($this->command . ' > ' . $this->outputFilename . ' & echo $!', $output);
            $status = true;
        }


        if ($os->isWindows()) {
            pclose(popen($this->command, 'r'));
            $status = true;
        }


        if (!$status) {
            (new Debug())->write('No Operating System found');
            (new Debug())->write($os->getOperatingSystem());
        }


        //pclose(popen($this->command. '', 'r'));

//        exec('start /B "window_name" "'.$this->command.'"',$output,$return);

        //$pid = shell_exec('start /B "'.$this->command.'"' );

        //pclose(popen("start /B ". $this->command, "a"));

//        $pid = exec('start '.$this->command . ' > '.$this->outputFilename, $output);


        //echo 'pid: '.$pid;
        /*if (posix_getpgid($pid)) {
            echo 'process is running';
        }*/


        return $pid;


    }

}