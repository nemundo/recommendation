<?php

namespace Nemundo\Db\Sql\Parameter;


use Nemundo\Core\Base\AbstractBase;


class SqlStatement extends AbstractBase
{

    /**
     * @var string
     */
    public $sql = '';

    /**
     * @var SqlParameter[]
     */
    private $parameterList = [];


    public function addParameter($key, $value, $fieldName)
    {

        $parameter = new SqlParameter();
        $parameter->fieldName = $fieldName;
        $parameter->key = $key;
        $parameter->value = $value;

        $this->parameterList[] = $parameter;

    }


    public function addParameterList($list)
    {

        $this->parameterList = array_merge($this->parameterList, $list);
        return $this;

    }


    public function getParameterList()
    {

        return $this->parameterList;

    }

}