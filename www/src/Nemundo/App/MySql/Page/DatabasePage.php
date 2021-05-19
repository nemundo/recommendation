<?php

namespace Nemundo\App\MySql\Page;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\App\MySql\Template\MySqlTemplate;
use Nemundo\Db\Reader\SqlReader;

class DatabasePage extends MySqlTemplate
{
    public function getContent()
    {

        $table = new AdminClickableTable($this);

        $header = new AdminTableHeader($table);
        $header->addText('Database');
        $header->addText('Charset');
        $header->addText('Collation');

        $reader = new SqlReader();
        $reader->sqlStatement->sql = 'SELECT * FROM information_schema.SCHEMATA';
        foreach ($reader->getData() as $dataRow) {

            $row = new AdminClickableTableRow($table);
            $row->addText($dataRow->getValue('SCHEMA_NAME'));
            $row->addText($dataRow->getValue('DEFAULT_CHARACTER_SET_NAME'));
            $row->addText($dataRow->getValue('DEFAULT_COLLATION_NAME'));

        }

        return parent::getContent();
    }
}