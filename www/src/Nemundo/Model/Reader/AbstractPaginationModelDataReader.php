<?php

namespace Nemundo\Model\Reader;


use Nemundo\Com\Pagination\PaginationTrait;
use Nemundo\Model\Count\ModelDataCount;
use Nemundo\Model\ModelConfig;
use Nemundo\Model\Row\ModelDataRow;


abstract class AbstractPaginationModelDataReader extends AbstractModelDataReader
{

    use PaginationTrait;

    /**
     * @var bool
     */
    //public $loadField = true;


    public function __construct()
    {

        parent::__construct();
        $this->paginationLimit = ModelConfig::$defaultPaginationLimit;
        $this->loadPageRequest();

    }


    /**
     * @return ModelDataRow[]
     */
    public function getData()
    {

        $this->limitStart = ($this->currentPage) * $this->paginationLimit;
        $this->limit = $this->paginationLimit;

        return parent::getData();

    }


    public function getTotalCount()
    {

        if (is_null($this->count)) {
            $dataCount = new ModelDataCount();
            $dataCount->model = $this->model;
            $dataCount->connection = $this->connection;
            $dataCount->filter = $this->filter;
            $this->count = $dataCount->getCount();
        }

        return $this->count;

    }

}