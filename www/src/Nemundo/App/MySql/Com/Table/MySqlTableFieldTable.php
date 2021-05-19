<?php


namespace Nemundo\App\MySql\Com\Table;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Provider\MySql\Field\MySqlTableFieldReader;

class MySqlTableFieldTable extends AdminTable
{

    public $tableName;


    public function getContent()
    {

        $header=new TableHeader($this);
        $header->addText('Field Name');
        $header->addText('Data Type');
        $header->addText('Lengtgh');
        $header->addText('Allow Null');
        $header->addText('Collation');
        $header->addText('Character');

        $reader=new MySqlTableFieldReader();
        $reader->tableName=$this->tableName;
        foreach ($reader->getData() as $field) {

            $row=new TableRow($this);
            $row->addText($field->fieldName);
            $row->addText($field->fieldType);
            $row->addText($field->fieldTypeLength);
            $row->addYesNo( $field->allowNull);
            $row->addText( $field->collation);
            $row->addText( $field->character);

        }

        return parent::getContent();

    }

}