<?php


namespace Nemundo\App\Linux\Local;


use Nemundo\Core\Local\AbstractLocalCommand;

class MkDirLocal extends AbstractLocalCommand
{

    public $path;

    protected function loadCommand()
    {

        $this->addCommand('md ' . $this->path);

    }

}