<?php

namespace Nemundo\Package\Bootstrap\Pagination;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Base\DataSource\PaginationTrait;


// BootstrapModelPagination
class BootstrapPagination extends AbstractBootstrapPagination
{

    /**
     * @var AbstractDataSource|PaginationTrait
     */
    public $paginationReader;

    /**
     * @var bool
     */
    public $showPreviousNext = true;

    /**
     * @var bool
     */
    public $showNumber = true;


    protected function getPaginationFrom()
    {
        return $this->paginationReader->getPaginationFrom();
    }


    protected function getPaginationTo()
    {
        return $this->paginationReader->getPaginationTo();
    }


    public function getContent()
    {

        $this->totalCount = $this->paginationReader->getTotalCount();
        $this->paginationLimit = $this->paginationReader->paginationLimit;

        return parent::getContent();

    }

}