<?php

namespace Nemundo\Model\Definition\Model;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Db\Index\AbstractPrimaryIndex;
use Nemundo\Db\Index\AutoIncrementIdPrimaryIndex;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Model\Definition\Index\AbstractModelIndex;
use Nemundo\Model\Definition\Order\ModelOrder;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Model\Type\Complex\AbstractComplexType;

// AbstractDataModel
abstract class AbstractModel extends AbstractBaseClass
{

    use TypeListTrait;

    /**
     * @var string
     */
    public $tableName;

    /**
     * @var string
     */
    public $label;

    /**
     * @var AbstractPrimaryIndex
     */
    public $primaryIndex;

    /**
     * @var AbstractModelType
     */
    public $id;

    /**
     * @var AbstractModelType[]
     */
    private $defaultTypeList = [];

    /**
     * @var ModelOrder[]
     */
    private $defaultOrderList = [];

    /**
     * @var AbstractModelIndex[]
     */
    private $indexList = [];

    abstract protected function loadModel();


    public function __construct()
    {

        $this->primaryIndex = new AutoIncrementIdPrimaryIndex();

        $this->loadModel();

        foreach ($this->getTypeList() as $type) {

            if ($type->isObjectOfClass(AbstractComplexType::class)) {
                $type->createObject();
            }

        }

    }


    public function getLabel()
    {

        $label = $this->label;
        if ($label == null) {
            $label = $this->tableName;
        }
        return $label;
    }


    public function addDefaultType(AbstractModelType $type)
    {
        $this->defaultTypeList[] = $type;
        return $this;
    }

    /**
     * @return AbstractModelType[]
     */
    public function getDefaultTypeList()
    {
        return $this->defaultTypeList;
    }


    public function addDefaultOrderType(AbstractModelType $type, $sortOrder = SortOrder::ASCENDING)
    {

        $order = new ModelOrder();
        $order->type = $type;
        $order->sortOrder = $sortOrder;

        $this->defaultOrderList[] = $order;

        return $this;
    }


    public function getDefaultOrderList()
    {
        return $this->defaultOrderList;
    }


    public function addIndex(AbstractModelIndex $index)
    {
        $this->indexList[] = $index;
        return $this;
    }


    public function removeIndex(AbstractModelIndex $index)
    {

        foreach ($this->indexList as $key => $value) {
            if ($value->indexName == $index->indexName) {
                unset($this->indexList[$key]);
            }
        }

        return $this;

    }


    public function getIndexList()
    {
        return $this->indexList;
    }


    public function checkModel()
    {


        $returnValue = true;

        /*if (!$this->checkProperty('tableName')) {
            $returnValue = false;
        }

        foreach ($this->getTypeList() as $field) {
            if (!$field->checkField()) {
                $returnValue = false;
            }
        }*/

        return $returnValue;

    }


}