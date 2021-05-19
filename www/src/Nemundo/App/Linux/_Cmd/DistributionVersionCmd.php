<?php


namespace Nemundo\App\Linux\Cmd;


class DistributionVersionCmd extends AbstractCmd
{

    protected function loadCmd()
    {

        $this->label = 'Distribution Version';
        $this->command = 'lsb_release -a';

    }

}