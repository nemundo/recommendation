<?php


namespace Nemundo\Model\Data;

use Nemundo\Core\Random\UniqueId;

use Nemundo\Db\Index\AutoIncrementIdPrimaryIndex;
use Nemundo\Db\Index\NumberIdPrimaryIndex;
use Nemundo\Db\Index\TextIdPrimaryIndex;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Model\Data\TypeValue\ModelTypeValueList;
use Nemundo\Model\Definition\Model\AbstractModel;


trait ModelDataTrait
{

    /**
     * @var AbstractModel
     */
    protected $model;

    /**
     * @var ModelTypeValueList
     */
    protected $typeValueList;


    protected function loadModelData()
    {

        $this->typeValueList = new ModelTypeValueList();

    }


    protected function prepeareSave()
    {

        $this->tableName = $this->model->tableName;

        foreach ($this->model->getTypeList() as $type) {
            if ($type->dataPropertyClassName !== null) {
                $className = $type->dataPropertyClassName;
                new $className($type, $this->typeValueList, $this->model);
            }
        }

        foreach ($this->typeValueList->getTypeValueList() as $typeValue) {
            $this->setValue($typeValue->type->fieldName, $typeValue->value);
        }

        $id = null;

        if ($this->model->primaryIndex->getClassName() == UniqueIdPrimaryIndex::class) {
            $id = (new UniqueId())->getUniqueId();
            $this->setValue($this->model->id->fieldName, $id);
            //parent::save();
        }

        if ($this->model->primaryIndex->getClassName() == AutoIncrementIdPrimaryIndex::class) {
            //$id = parent::save();
        }


        if (($this->model->primaryIndex->getClassName() == NumberIdPrimaryIndex::class) ||
            (($this->model->primaryIndex->getClassName() == TextIdPrimaryIndex::class))
        ) {

            //parent::save();

        }

        // Action
        /*foreach ($this->model->action->getInsertActionList() as $action) {
            $action->id = $id;
            $action->connection = $this->connection;
            $action->model = $this->model;
            $action->run($id);
        }*/

        return $id;

    }

}
