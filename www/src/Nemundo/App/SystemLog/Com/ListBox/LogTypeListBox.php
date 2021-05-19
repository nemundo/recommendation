<?php

namespace Nemundo\App\SystemLog\Com\ListBox;

use Nemundo\App\SystemLog\Data\LogType\LogTypeReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class LogTypeListBox extends BootstrapListBox
{
    public function getContent()
    {
        $this->label = 'LogType';

        $reader=new LogTypeReader();
        foreach ($reader->getData() as $logTypeRow) {
            $this->addItem($logTypeRow->id,$logTypeRow->logType);
        }


        return parent::getContent();
    }
}