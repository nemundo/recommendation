<?php

namespace Nemundo\Model\Count;


use Nemundo\Core\Type\Number\Number;
use Nemundo\Db\Count\AbstractDataCount;
use Nemundo\Db\Sql\Join\SqlJoin;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Definition\Model\TypeListTrait;
use Nemundo\Model\Type\External\ExternalType;


abstract class AbstractModelDataCount extends AbstractDataCount
{

    /**
     * @var AbstractModel
     */
    public $model;

    /**
     * @var int
     */
    private $count;

    /**
     * @return int
     */
    public function getCount()
    {

        if ($this->count === null) {
            $this->checkExternal($this->model);
            $this->tableName = $this->model->tableName;
            $this->count = parent::getCount();
        }

        return $this->count;

    }


    public function getFormatCount()
    {

        $format = (new Number($this->getCount()))->formatNumber();
        return $format;

    }


    /**
     * @param $typeList TypeListTrait
     */
    protected function checkExternal($typeList)
    {

        /** @var ExternalType|TypeListTrait $type */
        foreach ($typeList->getTypeList() as $type) {

            if ($type->isObjectOfClass(ExternalType::class)) {

                $join = new SqlJoin();
                $join->fieldName = $type->getConditionFieldName();
                $join->externalTableName = $type->externalTableName;
                $join->externalFieldName = 'id';
                $join->externalAliasTableName = $type->aliasTableName;
                $this->select->addJoin($join);

                $this->checkExternal($type);


            }

        }

    }

}