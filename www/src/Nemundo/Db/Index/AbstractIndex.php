<?php

namespace Nemundo\Db\Index;

use Nemundo\Db\Base\AbstractDbBase;
use Nemundo\Db\Table\AbstractTable;


abstract class AbstractIndex extends AbstractDbBase
{

    /**
     * @var string
     */
    public $indexName;

    /**
     * @var string
     */
    protected $tableName;

    /**
     * @var string[]
     */
    protected $fieldList = [];


    function __construct(AbstractTable $table = null)
    {
        parent::__construct();

        $this->loadIndex();

        if ($table !== null) {
            $this->tableName = $table->tableName;
            $table->addIndex($this);
        }

    }

    abstract public function getSql();

    abstract protected function loadIndex();


    public function addField($fieldName)
    {
        $this->fieldList[] = $fieldName;
        return $this;
    }

/*
    public function createIndex()
    {
        $this->connection->execute($this->getSql());
        return $this;
    }


    public function dropIndex() {

    }*/


}
