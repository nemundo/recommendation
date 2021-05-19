<?php

namespace Nemundo\Model\Id;


use Nemundo\Db\Base\AbstractDbBase;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Model\Value\ModelDataValue;


// AbstractModelId
abstract class AbstractModelIdValue extends AbstractDbBase
{

    /**
     * @var Filter
     */
    public $filter;

    /**
     * @var AbstractModel
     */
    public $model;

    /**
     * @var ModelDataValue
     */
    private $value;


    public function __construct()
    {
        parent::__construct();
        $this->value = new ModelDataValue();
        $this->filter = new Filter();
    }


    public function addOrder(AbstractModelType $type, $sortOrder = SortOrder::ASCENDING)
    {
        $this->value->addOrder($type, $sortOrder);
        return $this;
    }


    /**
     * @return string
     */
    public function getId()
    {

        $this->value->connection = $this->connection;
        $this->value->model = $this->model;
        $this->value->field = $this->model->id;
        $this->value->filter = $this->filter;
        $id = $this->value->getValue();
        return $id;
    }

}