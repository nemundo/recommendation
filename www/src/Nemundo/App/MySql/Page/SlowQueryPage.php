<?php

namespace Nemundo\App\MySql\Page;

use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\App\MySql\Com\Form\DeleteQuerySlowLogFileForm;
use Nemundo\App\MySql\Com\Form\SlowQuerySwitcherForm;
use Nemundo\App\MySql\Config\SlowLogFilename;
use Nemundo\App\MySql\Template\MySqlTemplate;
use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Core\Type\File\File;
use Nemundo\Db\Provider\MySql\Information\MySqlVariable;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Html\Typography\Code;

class SlowQueryPage extends MySqlTemplate
{
    public function getContent()
    {

        //   LIKE 'maria_group_commit';

        $variable = (new MySqlVariable())->getValue('slow_query_log');

        $p = new Paragraph($this);
        $p->content = 'Value: ' . $variable;

        $table = new AdminLabelValueTable($this);
        $table->addLabelValue('Slow Log', (new MySqlVariable())->getValue('slow_query_log'));
        $table->addLabelValue('Log File', (new MySqlVariable())->getValue('slow_query_log_file'));
        $table->addLabelValue('Query Time', (new MySqlVariable())->getValue('long_query_time'));



        //long_query_time


        // timeslot

        new SlowQuerySwitcherForm($this);

        new DeleteQuerySlowLogFileForm($this);

        //$table = new MySqlVariable()

/*
        $datadir = (new MySqlVariable())->getValue('datadir');
        $filename = (new MySqlVariable())->getValue('slow_query_log_file');*/

        $fullFilename = (new SlowLogFilename())->getFilename();   // $datadir . $filename;

        //   slow_query_log_file

        $p = new Paragraph($this);
        $p->content = 'Value: ' . $fullFilename;


        if ((new File($fullFilename))->fileExists()) {

            $code = new Code($this);
            $code->content = (new TextFileReader($fullFilename))->getText();

        } else {

            $p = new Paragraph($this);
            $p->content = 'No file exists';

        }


        return parent::getContent();
    }
}