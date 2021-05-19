<?php


namespace Nemundo\App\Linux\Cmd;


class RebootCmd extends AbstractCmd
{

    protected function loadCmd()
    {

        $this->label = 'Reboot';
        $this->command = 'sudo shutdown -r now';

    }

}