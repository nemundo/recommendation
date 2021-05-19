<?php

namespace Nemundo\Orm\Type;


use Nemundo\Core\Type\Number\YesNo;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Dev\Code\PrefixPhpClassTrait;
use Nemundo\Model\Type\Complex\AbstractComplexType;
use Nemundo\Orm\Model\AbstractOrmModel;


trait OrmTypeTrait
{

    use PrefixPhpClassTrait;

    /**
     * @var string
     */
    public $typeLabel;

    /**
     * @var string
     */
    public $typeName;

    /**
     * @var string
     */
    public $typeId;

    /**
     * @var string
     */
    public $variableName;

    /**
     * @var AbstractOrmModel
     */
    public $model;

    /**
     * @var bool
     */
    public $createModelProperty = true;

    /**
     * @var bool
     */
    public $isEditable = true;

    /**
     * @var bool
     */
    public $isDeleted = false;


    abstract public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction);

    abstract public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction);

    abstract public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction);

    abstract public function getRowCode(PhpClass $phpClass);


    public function getDataUpdateCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        return $this->getDataCode($phpClass, $phpFunction);
    }


    public function getDataAfterSaveCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
    }


    protected function addModelObject(PhpClass $phpClass, PhpFunction $phpFunction, $className)
    {

        if ($this->createModelProperty) {

            $className = $this->prefixClassName($className);

            $variable = new PhpVariable($phpClass);
            $variable->variableName = $this->variableName;
            $variable->dataType = $className;

            $phpFunction->add('$this->' . $this->variableName . ' = new ' . $className . '($this);');

            $this->addModelDefaultCode($phpFunction);

        }

    }


    protected function addModelDefaultCode(PhpFunction $phpFunction)
    {

        $tableName = $this->model->tableName;

        $aliasFieldName = $tableName . '_' . $this->fieldName;

        $phpFunction->add('$this->' . $this->variableName . '->tableName = "' . $tableName . '";');
        $phpFunction->add('$this->' . $this->variableName . '->externalTableName = "' . $tableName . '";');
        $phpFunction->add('$this->' . $this->variableName . '->fieldName = "' . $this->fieldName . '";');
        $phpFunction->add('$this->' . $this->variableName . '->aliasFieldName = "' . $aliasFieldName . '";');
        $phpFunction->add('$this->' . $this->variableName . '->label = "' . $this->label . '";');

        if ($this->defaultValue !== null) {
            $phpFunction->add('$this->' . $this->variableName . '->defaultValue = ' . $this->defaultValue . ';');
        }

        $phpFunction->add('$this->' . $this->variableName . '->allowNullValue = ' . (new YesNo($this->allowNullValue))->getText() . ';');

    }


    protected function addExternlObject(PhpClass $phpClass, PhpFunction $phpFunction, $className, $additionalCode = [])
    {

        $className = $this->prefixClassName($className);

        $variable = new PhpVariable($phpClass);
        $variable->variableName = $this->variableName;
        $variable->dataType = $className;

        $phpFunction->add('$this->' . $this->variableName . ' = new ' . $className . '();');
        $phpFunction->add('$this->' . $this->variableName . '->fieldName = "' . $this->fieldName . '";');
        $phpFunction->add('$this->' . $this->variableName . '->tableName = $this->parentFieldName . "_" . $this->externalTableName;');

        $phpFunction->add('$this->' . $this->variableName . '->externalTableName = $this->externalTableName;');

        //$this->image->externalTableName=$this->externalTableName;

        $phpFunction->add('$this->' . $this->variableName . '->aliasFieldName = $this->' . $this->variableName . '->tableName . "_" . $this->' . $this->variableName . '->fieldName;');
        $phpFunction->add('$this->' . $this->variableName . '->label = "' . $this->label . '";');

        foreach ($additionalCode as $line) {
            $phpFunction->add($line);
        }

        if ($this->isObjectOfClass(AbstractComplexType::class)) {
            $phpFunction->add('$this->' . $this->variableName . '->createObject();');
        }

        $phpFunction->add('$this->addType($this->' . $this->variableName . ');');

    }


    protected function addDataPrimitiveVariable(PhpClass $phpClass, PhpFunction $phpFunction, $dataType)
    {

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = $dataType;

        $phpFunction->add('$this->typeValueList->setModelValue($this->model->' . $this->variableName . ', $this->' . $this->variableName . ');');

    }


    protected function addDataObject(PhpClass $phpClass, PhpFunction $phpFunction, $objectClassName, $propertyClassName)
    {

        $propertyClassName = $this->prefixClassName($propertyClassName);
        $objectClassName = $this->prefixClassName($objectClassName);

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->dataType = $objectClassName;

        $phpClass->addConstructor('$this->' . $this->variableName . ' = new ' . $objectClassName . '();');

        $phpFunction->add('$property = new ' . $propertyClassName . '($this->model->' . $this->variableName . ', $this->typeValueList);');
        $phpFunction->add('$property->setValue($this->' . $this->variableName . ');');

    }


    protected function addDataProperty(PhpClass $phpClass, $propertyClassName)
    {

        $propertyClassName = $this->prefixClassName($propertyClassName);

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->dataType = $propertyClassName;

        $phpClass->addConstructor('$this->' . $this->variableName . ' = new ' . $propertyClassName . '($this->model->' . $this->variableName . ', $this->typeValueList);');

    }


    protected function addRowPrimitiveVarialbe(PhpClass $phpClass, $dataType)
    {

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = $dataType;

        $phpClass->addConstructor('$this->' . $this->variableName . ' = $this->getModelValue($model->' . $this->variableName . ');');

    }


    protected function addRowPrimitiveConversionFunctionVarialbe(PhpClass $phpClass, $dataType, $conversionFunction)
    {

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = $dataType;

        $phpClass->addConstructor('$this->' . $this->variableName . ' = ' . $conversionFunction . '($this->getModelValue($model->' . $this->variableName . '));');

    }


    protected function addRowObject(PhpClass $phpClass, $objectClassName)
    {

        $objectClassName = $this->prefixClassName($objectClassName);

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->dataType = $objectClassName;

        $phpClass->addConstructor('$this->' . $this->variableName . ' = new ' . $objectClassName . '($this->getModelValue($model->' . $this->variableName . '));');

    }


    protected function addRowObjectProperty(PhpClass $phpClass, $objectClassName, $propertyClassName)
    {

        $propertyClassName = $this->prefixClassName($propertyClassName);
        $objectClassName = $this->prefixClassName($objectClassName);

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->dataType = $objectClassName;

        $phpClass->addConstructor('$property = new ' . $propertyClassName . '($row, $model->' . $this->variableName . ');');
        $phpClass->addConstructor('$this->' . $this->variableName . ' = $property->getValue();');

    }

    protected function addRowProperty(PhpClass $phpClass, $propertyClassName)
    {
        $propertyClassName = $this->prefixClassName($propertyClassName);

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->dataType = $propertyClassName;

        $phpClass->addConstructor('$this->' . $this->variableName . ' = new ' . $propertyClassName . '($row, $model->' . $this->variableName . ');');

    }

}