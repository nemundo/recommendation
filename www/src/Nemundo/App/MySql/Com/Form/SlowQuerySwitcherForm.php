<?php


namespace Nemundo\App\MySql\Com\Form;


use Nemundo\Db\DbConfig;
use Nemundo\Db\Execute\SqlExecute;
use Nemundo\Db\Provider\MySql\Information\MySqlVariable;
use Nemundo\Db\Sql\Parameter\SqlStatement;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;

class SlowQuerySwitcherForm extends BootstrapForm
{

    public function getContent()
    {

        $variable = (new MySqlVariable())->getValue('slow_query_log');

        $p = new Paragraph($this);
        $p->content = 'Value: ' . $variable;

        $this->submitButton->label = 'Change';

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $value = 1;
        if ((new MySqlVariable())->getValue('slow_query_log') == 'ON') {
            $value = 0;
        }

        $variable=(new MySqlVariable())->getValue('slow_query_log');


        // SqlExecute

        $sql = new SqlStatement();
        $sql->sql = 'SET slow_query_log='.$value.';';
        (new SqlExecute())->execute($sql);

        $sql = new SqlStatement();
        $sql->sql = 'SET long_query_time=1;';
        (new SqlExecute())->execute($sql);



        //DbConfig::$defaultConnection->execute($sql);


    }

}