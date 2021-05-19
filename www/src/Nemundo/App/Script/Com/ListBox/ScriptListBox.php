<?php

namespace Nemundo\App\Script\Com\ListBox;

use Nemundo\App\Script\Data\Script\ScriptReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class ScriptListBox extends BootstrapListBox
{
    public function getContent()
    {

        $this->label = 'Script';

        $reader = new ScriptReader();
        $reader->addOrder($reader->model->scriptName);
        foreach ($reader->getData() as $scriptRow) {
            $this->addItem($scriptRow->id, $scriptRow->scriptName);
        }

        return parent::getContent();
    }
}