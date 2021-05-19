<?php

namespace Nemundo\Model\Definition\Order;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Orm\Type\OrmTypeTrait;

class ModelOrder extends AbstractBase
{

    /**
     * @var AbstractModelType|OrmTypeTrait
     */
    public $type;

    /**
     * @var SortOrder
     */
    public $sortOrder = SortOrder::DESCENDING;

}