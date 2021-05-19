<?php


namespace Nemundo\App\Git\Page;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\App\Git\Command\GitVersion;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Local\LocalCommand;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Html\Paragraph\Paragraph;

class GitPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $cmd=new LocalCommand();
        $value = $cmd->runLocalCommand('git tag');

        $subtitle=new AdminSubtitle($this);
        $subtitle->content='Git Tag';

        $table=new AdminTable($this);

        foreach ($value as $line) {
            $row=new TableRow($table);

            $cell=new Text($line);
            foreach ($cell->split(' ') as $item) {
                $row->addText($item);
            }
            //$row->addText($line);
        }



        $cmd=new LocalCommand();
        $value = $cmd->runLocalCommand('git submodule');

        $subtitle=new AdminSubtitle($this);
        $subtitle->content='Git Submodule';

        $table=new AdminTable($this);

        foreach ($value as $line) {
            $row=new TableRow($table);

            $cell=new Text($line);
            foreach ($cell->split(' ') as $item) {
                $row->addText($item);
            }
            //$row->addText($line);
        }


        $p=new Paragraph($this);
        $p->content='Git Version: '. (new GitVersion())->getVersion();  // (new LocalCommand())->runLocalCommand('git --version')[0];


        return parent::getContent();

    }

}