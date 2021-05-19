<?php

namespace Nemundo\App\Mail\Script;


use Nemundo\App\Mail\Data\MailQueue\MailQueueDelete;
use Nemundo\App\Script\Type\AbstractScript;

class MailQueueDeleteScript extends AbstractScript
{

    protected function loadScript()
    {
        $this->scriptName = 'mail-queue-delete';
        $this->consoleScript = true;
        $this->description = 'Delete the mail queue';
    }


    public function run()
    {

        (new MailQueueDelete())->delete();

    }

}