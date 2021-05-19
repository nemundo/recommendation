<?php

namespace Nemundo\App\MySql\Com\Table;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Db\Base\ConnectionTrait;
use Nemundo\Db\Count\DataCount;
use Nemundo\Db\Provider\MySql\Field\MySqlTableFieldReader;
use Nemundo\Db\Reader\DataReader;
use Nemundo\Db\Sql\Field\Field;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Model\Type\Id\IdType;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPlainPagination;


class MySqlDataTable extends AbstractContainer
{

    use ConnectionTrait;

    /**
     * @var string
     */
    public $tableName;

    /**
     * @var int
     */
    public $limit = 30;

    /**
     * @var bool
     */
    public $hideIdField = false;

    public $filterId;


    protected function loadContainer()
    {
        parent::loadContainer();
        $this->loadConnection();
    }

    public function getContent()
    {

        if (!$this->checkProperty('tableName')) {
            return;
        }


        $count = new DataCount();
        $count->connection = $this->connection;
        $count->tableName = $this->tableName;

        $p = new Paragraph($this);
        $p->content = $count->getCount() . ' Items found';


        $table = new AdminTable($this);

        $pagination = new BootstrapPlainPagination($this);
        $pagination->totalCount = $count->getCount();

        $fieldReader = new MySqlTableFieldReader();
        $fieldReader->connection = $this->connection;
        $fieldReader->tableName = $this->tableName;

        $header = new TableHeader($table);
        foreach ($fieldReader->getData() as $field) {
            $header->addText($field->fieldName);
        }


        $reader = new DataReader();
        $reader->connection = $this->connection;
        $reader->tableName = $this->tableName;
        $reader->limit = $this->limit;
        $reader->limitStart = $this->limit * $pagination->getCurrentPage();

        if ($this->filterId!==null) {
            $field=new Field();
            $field->fieldName='id';
            $reader->filter->andEqual($field, $this->filterId);
        }

        foreach ($reader->getData() as $item) {
            $row = new TableRow($table);
            foreach ($fieldReader->getData() as $field) {

                $value = $item->getValue($field->fieldName);

                if ($value == null) {
                    $value = '(NULL)';
                }

                // html decode

                $row->addText($value);

            }
        }


        return parent::getContent();

    }

}