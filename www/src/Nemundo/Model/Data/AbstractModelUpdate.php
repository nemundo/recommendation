<?php

namespace Nemundo\Model\Data;


use Nemundo\Db\Data\AbstractUpdate;
use Nemundo\Db\Sql\Join\SqlJoin;
use Nemundo\Model\Data\TypeValue\ModelTypeValueList;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Type\External\ExternalType;


abstract class AbstractModelUpdate extends AbstractUpdate
{

    /**
     * @var AbstractModel
     */
    public $model;

    /**
     * @var bool
     */
    public $includeExternal = false;

    /**
     * @var ModelTypeValueList
     */
    protected $typeValueList;


    public function __construct()
    {
        parent::__construct();
        $this->typeValueList = new ModelTypeValueList();
    }


    public function update()
    {

        $this->tableName = $this->model->tableName;

        if ($this->includeExternal) {

            /** @var ExternalType $type */
            foreach ($this->model->getTypeList() as $type) {

                if ($type->isObjectOfClass(ExternalType::class)) {

                    $join = new SqlJoin();
                    $join->fieldName = $type->getConditionFieldName();
                    $join->externalTableName = $type->externalTableName;
                    $join->externalFieldName = 'id';
                    $join->externalAliasTableName = $type->aliasTableName;

                    $this->addJoin($join);

                }

            }

        }

        foreach ($this->model->getTypeList() as $type) {
            if ($type->updatePropertyClassName !== null) {
                $className = $type->updatePropertyClassName;
                new $className($type, $this->typeValueList, $this->model);
            }
        }

        foreach ($this->typeValueList->getTypeValueList() as $typeValue) {
            $this->setValue($typeValue->type->fieldName, $typeValue->value);
        }

        parent::update();

    }


    public function updateById($id)
    {
        $this->filter->andEqual($this->model->id, $id);
        $this->update();
    }

}