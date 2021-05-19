<?php


namespace Nemundo\App\Linux\Reader;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Local\LocalCommand;
use Nemundo\Core\Type\Text\Text;

class CommandReader extends AbstractDataSource
{

    public $command;

    protected function loadData()
    {

        $cmd = new LocalCommand();
        $value = $cmd->runLocalCommand($this->command);

        foreach ($value as $line) {
            $list = (new Text($line))->split(' ');
            $this->addItem($list);
        }

    }

}