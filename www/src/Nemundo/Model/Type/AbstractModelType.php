<?php

namespace Nemundo\Model\Type;

use Nemundo\Core\Validation\ValidationType;
use Nemundo\Db\Sql\Field\AbstractColumnField;
use Nemundo\Model\Data\Property\AbstractDataProperty;
use Nemundo\Model\Definition\Model\AbstractModel;

abstract class AbstractModelType extends AbstractColumnField
{

    /**
     * @var string|string[]
     */
    public $label;

    /**
     * @var string
     */
    public $defaultValue;

    /**
     * @var bool
     */
    public $allowNullValue = false;
    // allowNull

    /**
     * @var bool
     */
    public $fieldMapping = true;

    /**
     * @var AbstractDataProperty
     */
    public $dataPropertyClassName;

    /**
     * @var AbstractDataProperty
     */
    public $updatePropertyClassName;


    public function __construct(AbstractModel $model = null)
    {

        if ($model !== null) {
            $model->addType($this);
        }

        $this->loadExternalType();

    }


    // loadType
    protected function loadExternalType()
    {
    }

    public function checkField()
    {

        $returnValue = true;

        if (!$this->checkProperty('fieldName')) {
            $returnValue = false;
        }

        return $returnValue;

    }

}