<?php


namespace Nemundo\App\Linux\Cmd;


class DiskUsageCmd extends AbstractCmd
{

    protected function loadCmd()
    {

        $this->label='Disk Usage';
        $this->command='df';

        // TODO: Implement loadCmd() method.
    }

}