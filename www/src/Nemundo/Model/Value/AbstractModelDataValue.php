<?php

namespace Nemundo\Model\Value;


use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Value\AbstractDataValue;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Join\ModelJoinListTrait;
use Nemundo\Model\Reader\FieldAddTrait;
use Nemundo\Model\Type\AbstractModelType;


abstract class AbstractModelDataValue extends AbstractDataValue
{

    use FieldAddTrait;
    use ModelJoinListTrait;

    /**
     * @var AbstractModel
     */
    public $model;

    /**
     * @var Filter
     */
    public $filter;



    private function checkFieldProperty()
    {

        // für max count etc ???

        //if (!$this->checkObject('field', $this->field, AbstractModelType::class)) {
        /*    if (!$this->checkObject('field', $this->field, AbstractModelType::class)) {
            exit;
        }*/
    }


    public function getValue()
    {

        $this->prepareData();
        $value = parent::getValue();
        return $value;

    }


    public function getValueById($id)
    {

        $this->filter->andEqual($this->model->id, $id);
        $value = $this->getValue();
        return $value;

    }


    public function getMinValue()
    {

        $this->prepareData();
        $value = parent::getMinValue();
        return $value;
    }


    // field als parameter ???
    public function getMaxValue()
    {

        $this->prepareData();
        $value = parent::getMaxValue();
        return $value;

    }


    public function getSumValue()
    {

        $this->prepareData();
        $value = parent::getSumValue();
        return $value;

    }


    private function prepareData()
    {

        $this->checkExternal($this->model,false);

        $this->checkFieldProperty();
        $this->tableName = $this->model->tableName;

    }

}