<?php

namespace Nemundo\App\Linux\Page;

use Nemundo\App\Linux\Com\Form\LocalCommandForm;
use Nemundo\App\Linux\Template\LinuxTemplate;


class CmdPage extends LinuxTemplate
{

    public function getContent()
    {


        new LocalCommandForm($this);


        /*
        $form = new SearchForm($this);

        $row = new BootstrapRow($form);

        $listbox = new CommandListBox($row);
        $listbox->submitOnChange = true;
        $listbox->searchMode = true;

        $listbox->addCommand(new DiskUsageCmd());
        $listbox->addCommand(new RebootCmd());
        $listbox->addCommand(new DistributionVersionCmd());


        if ($listbox->hasValue()) {


            $cmd = new LocalCommand();
            $value = $cmd->runLocalCommand($listbox->getValue());


            $code = new Code($this);
            $code->content = $value;


            $table = new AdminTable($this);


            foreach ($value as $str) {

                $row = new AdminTableRow($table);
                $row->addText($str);

                $list = (new Text($str))->split(' ');
                foreach ($list as $item) {
                    $row->addText($item);
                }


                /*
                                $list = (new Text($str))->split(chr(9));
                                foreach ($list as $item) {
                                    $row->addText($item);
                                }*/


        /*    }

        }*/


        return parent::getContent();
    }
}