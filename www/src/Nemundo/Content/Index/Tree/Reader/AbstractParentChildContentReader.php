<?php

namespace Nemundo\Content\Index\Tree\Reader;


use Nemundo\Content\Index\Tree\Data\Tree\TreeRow;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\DataSource\AbstractDataSource;

abstract class AbstractParentChildContentReader extends AbstractDataSource
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    public $limit;


    /**
     * @return TreeRow[]
     */
    public function getData()
    {
        return parent::getData();
    }

}