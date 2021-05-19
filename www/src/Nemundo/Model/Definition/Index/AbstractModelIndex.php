<?php

namespace Nemundo\Model\Definition\Index;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Type\AbstractModelType;

abstract class AbstractModelIndex extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $indexId;

    /**
     * @var string
     */
    public $indexLabel;

    /**
     * @var string
     */
    public $indexType;

    /**
     * @var string
     */
    public $indexName;

    /**
     * @var bool
     */
    public $isEditable=true;

    abstract protected function loadIndex();


    public function __construct(AbstractModel $model = null)
    {

        $this->loadIndex();

        if ($model !== null) {
            $model->addIndex($this);
        }

    }


    /**
     * @var AbstractModelType[]
     */
    protected $typeList = [];


    public function addType(AbstractModelType $type=null)
    {
        $this->typeList[] = $type;
        return $this;
    }


    public function removeType(AbstractModelType $type)
    {

        foreach ($this->typeList as $key => $value) {
            if ($value->fieldName == $type->fieldName) {
                unset($this->typeList[$key]);
            }
        }

        return $this;

    }


    public function getTypeList()
    {
        return $this->typeList;
    }


    public function getFieldNameList()
    {

        $fieldNameList = [];
        foreach ($this->typeList as $field) {
            $fieldNameList[] = $field->fieldName;
        }

        return $fieldNameList;

    }

}