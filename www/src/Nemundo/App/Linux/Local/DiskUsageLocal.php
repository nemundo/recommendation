<?php


namespace Nemundo\App\Linux\Local;


use Nemundo\Core\Local\AbstractLocalCommand;

class DiskUsageLocal extends AbstractLocalCommand
{


    protected function loadCommand()
    {

        $this->addCommand('df');

        // TODO: Implement loadCommand() method.
    }


}