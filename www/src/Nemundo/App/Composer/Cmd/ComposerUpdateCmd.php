<?php


namespace Nemundo\App\Composer\Cmd;


use Nemundo\App\Linux\Cmd\AbstractCmd;

class ComposerUpdateCmd extends AbstractCmd
{

    protected function loadCmd()
    {

        $this->label = 'Composer Update';
        $this->command = 'composer update';

    }

}