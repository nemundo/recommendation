<?php

namespace Nemundo\App\Linux\Com\ListBox;

use Nemundo\App\Linux\Cmd\AbstractCmd;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class CommandListBox extends BootstrapListBox
{

    /**
     * @var AbstractCmd[]
     */
    private $cmdList = [];

    public function addCommand(AbstractCmd $cmd)
    {
        $this->cmdList[] = $cmd;
        return $this;
    }


    public function getContent()
    {
        $this->label = 'Command';

        foreach ($this->cmdList as $cmd) {
            $this->addItem($cmd->command, $cmd->label);
        }

        return parent::getContent();
    }
}