<?php

namespace Nemundo\Content\App\Contact\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\App\Contact\Data\ContactIndex\ContactIndexDelete;

class ContactCleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'contact-clean';
    }

    public function run()
    {

        (new ContactIndexDelete())->delete();


    }
}