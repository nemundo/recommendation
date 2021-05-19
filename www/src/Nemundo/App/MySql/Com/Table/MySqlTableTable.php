<?php


namespace Nemundo\App\MySql\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\App\MySql\Parameter\TableParameter;
use Nemundo\Db\Provider\MySql\Table\MySqlTableReader;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\Site;

class MySqlTableTable extends AdminClickableTable
{

    public function getContent()
    {

        $reader = new MySqlTableReader();
        foreach ($reader->getData() as $table) {

            $row = new BootstrapClickableTableRow($this);
            $row->addText($table->tableName);

            $site = new Site();
            $site->addParameter(new TableParameter($table->tableName));
            $row->addClickableSite($site);

        }

        return parent::getContent();

    }

}