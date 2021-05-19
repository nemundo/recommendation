<?php

namespace Nemundo\App\Composer\Page;

use Nemundo\Admin\Com\Copy\CopyTextBox;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Local\LocalCommand;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Project\ProjectConfig;

class ComposerPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $path = ProjectConfig::$projectPath;

        //$path = 'C:\git\lib\nemundo_com';

        $line = 'cd ' . $path . ' && composer show';
        //(new Debug())->write($line);


        $copy = new CopyTextBox($this);
        $copy->value=$line;


        $table = new AdminTable($this);

        $cmd = new LocalCommand();
        $value = $cmd->runLocalCommand($line);

        foreach ($value as $version) {

            $row = new AdminTableRow($table);
            $row->addText($version);

            $list= (new Text($version))->split(chr(9));
            foreach ($list as $value) {
                $row->addText($value);
            }



        }


        return parent::getContent();
    }
}