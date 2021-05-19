<?php


namespace Nemundo\App\Linux\Cmd;


use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Local\AbstractLocalCommand;

class Zip7Cmd extends AbstractLocalCommand
{


    public $path;

    public $zipFilename;


    protected function loadCommand()
    {
        // TODO: Implement loadCommand() method.
    }


    public function create7Zip() {


        $this->showOutput=true;

        $cmd = '7z a '.$this->zipFilename.' '.$this->path;


        (new Debug())->write($cmd);

        $this->addCommand($cmd);

        return $this->runCommand();


        //  // sudo 7z a /transfer/xcontest_search_2021.7z /srv/cache/xcontest/search/2021




    }

}