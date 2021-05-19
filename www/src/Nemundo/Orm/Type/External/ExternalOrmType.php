<?php

namespace Nemundo\Orm\Type\External;

use Nemundo\Core\Check\ValueCheck;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\Number\YesNo;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Db\Index\AutoIncrementIdPrimaryIndex;
use Nemundo\Db\Index\NumberIdPrimaryIndex;
use Nemundo\Db\Index\TextIdPrimaryIndex;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Model\Type\External\ExternalType;
use Nemundo\Model\Type\External\Id\ExternalIdType;
use Nemundo\Model\Type\External\Id\ExternalUniqueIdType;
use Nemundo\Model\Type\Id\IdType;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\OrmTypeTrait;
use Nemundo\Orm\Utility\UppercaseFirstLetter;


class ExternalOrmType extends ExternalType
{

    use OrmTypeTrait;

    /**
     * @var string
     */
    public $externalClassName;

    /**
     * @var bool
     */
    public $loadModel = false;

    /**
     * @var string
     */
    public $rowClassName;

    protected function loadExternalType()
    {

        parent::loadExternalType();
        $this->typeLabel = 'External';
        $this->typeName = 'external';
        $this->typeId = '26e8b692-3af6-46ff-96ae-f10c983deb06';

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        if ($this->createModelProperty) {

            $externalModelClassName = $this->prefixClassName($this->externalClassName . 'Model');

            if ($this->externalModelClassName !== null) {
                $externalModelClassName = $this->externalModelClassName;
            }

            if (class_exists($externalModelClassName)) {

                try {

                    /** @var AbstractOrmModel $externalModel */
                    $externalModel = new $externalModelClassName();

                    $className = null;

                    switch ($externalModel->primaryIndex->getClassName()) {
                        case AutoIncrementIdPrimaryIndex::class:
                        case NumberIdPrimaryIndex::class:
                            $className = ExternalIdType::class;
                            break;

                        case UniqueIdPrimaryIndex::class:
                        case TextIdPrimaryIndex::class:
                            $className = ExternalUniqueIdType::class;
                            break;

                    }

                    $this->addExternalModelCode($phpClass, $phpFunction, $className);

                } catch (\Throwable $ex) {
                    (new LogMessage())->writeError('Could not create Model. Model: ' . $externalModelClassName);
                }


            } else {
                (new LogMessage())->writeError($phpClass->className . ': Class does not exist. Class: ' . $externalModelClassName);
            }

        }

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternalExternalCode($phpClass, $phpFunction, IdType::class);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $variableName = $this->variableName . 'Id';

        $var = new PhpVariable($phpClass);
        $var->variableName = $variableName;
        $var->dataType = 'string';

        $phpFunction->add('$this->typeValueList->setModelValue($this->model->' . $variableName . ', $this->' . $variableName . ');');

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $externalModelClassName = $this->prefixClassName($this->externalClassName . 'Model');

        if ($this->externalModelClassName !== null) {
            $externalModelClassName = $this->externalModelClassName;
        }


        $dataType = null;
        $pre = '';
        $after = '';

        if (class_exists($externalModelClassName)) {

            /** @var AbstractOrmModel $externalModel */
            $externalModel = new $externalModelClassName();

            switch ($externalModel->primaryIndex->getClassName()) {
                case AutoIncrementIdPrimaryIndex::class:
                case NumberIdPrimaryIndex::class:
                    $dataType = 'int';
                    $pre = 'intval(';
                    $after = ')';

                    break;

                case UniqueIdPrimaryIndex::class:
                case TextIdPrimaryIndex::class:
                    $dataType = 'string';
                    break;

            }

        } else {
            (new LogMessage())->writeError('clas does not exist: ' . $externalModelClassName);
        }


        $idVariableName = $this->variableName . 'Id';

        $var = new PhpVariable($phpClass);
        $var->variableName = $idVariableName;
        $var->dataType = $dataType;

        $phpClass->addConstructor('$this->' . $idVariableName . ' = ' . $pre . '$this->getModelValue($model->' . $idVariableName . ')' . $after . ';');

        $externalModelClassName = $this->getExternalClassName();
        $externalModelFunctionName = 'load' . (new Text($externalModelClassName . $this->variableName))->replace('\\', '')->getValue() . 'Row';

        $phpClass->addConstructor('if ($model->' . $this->variableName . ' !== null) {');
        $phpClass->addConstructor('$this->' . $externalModelFunctionName . '($model->' . $this->variableName . ');');
        $phpClass->addConstructor('}');

        $rowClassName = $this->prefixClassName($externalModelClassName . 'Row');

        if ((new ValueCheck())->hasValue($this->rowClassName)) {
            $rowClassName = $this->prefixClassName($this->rowClassName);
        }

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->dataType = $rowClassName;

        $loadFunction = new PhpFunction($phpClass);
        $loadFunction->functionName = $externalModelFunctionName . '($model)';
        $loadFunction->visibility = PhpVisibility::PrivateVariable;

        $loadFunction->add('$this->' . $this->variableName . ' = new ' . $rowClassName . '($this->row, $model);');

    }


    protected function getExternalClassName()
    {

        $externalClasName = $this->externalClassName;

        if ($this->externalModelClassName !== null) {

            /** @var AbstractOrmModel $externalModel */
            $externalModel = new $this->externalModelClassName();

            if ($externalModel->isObjectOfClass(AbstractOrmModel::class)) {
                $externalClasName = $externalModel->namespace . '\\' . $externalModel->className;
            }

        }

        return $externalClasName;

    }


    protected function getAliasFieldName()
    {

        $aliasFieldName = $this->model->tableName . '_' . $this->fieldName;
        return $aliasFieldName;

    }


    protected function getExternalTypeClassName()
    {

        $externalTypeClassName = $this->getExternalClassName() . 'ExternalType';
        $externalTypeClassName = $this->prefixClassName($externalTypeClassName);
        return $externalTypeClassName;

    }


    protected function getIdVariableName()
    {
        $variableName = $this->variableName . 'Id';
        return $variableName;


    }


    protected function addExternalModelCode(PhpClass $phpClass, PhpFunction $phpFunction, $className)
    {

        $className = $this->prefixClassName($className);

        $variable = new PhpVariable($phpClass);
        $variable->variableName = $this->getIdVariableName();
        $variable->dataType = $className;

        $phpFunction->add('$this->' . $this->getIdVariableName() . ' = new ' . $className . '($this);');
        $phpFunction->add('$this->' . $this->getIdVariableName() . '->tableName = "' . $this->model->tableName . '";');
        $phpFunction->add('$this->' . $this->getIdVariableName() . '->fieldName = "' . $this->fieldName . '";');
        $phpFunction->add('$this->' . $this->getIdVariableName() . '->aliasFieldName = "' . $this->getAliasFieldName() . '";');
        $phpFunction->add('$this->' . $this->getIdVariableName() . '->label = "' . $this->label . '";');
        $phpFunction->add('$this->' . $this->getIdVariableName() . '->allowNullValue = ' . (new YesNo($this->allowNullValue))->getText() . ';');

        $this->addLoadFunction($phpClass, $phpFunction);

    }


    protected function addLoadFunction(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $variable = new PhpVariable($phpClass);
        $variable->variableName = $this->variableName;
        $variable->dataType = $this->getExternalTypeClassName();

        $functionName = 'load' . (new UppercaseFirstLetter())->uppercaseFirstLetter($this->variableName) . '()';

        $loadFunction = new PhpFunction($phpClass);
        $loadFunction->functionName = $functionName;
        $loadFunction->add('if ($this->' . $this->variableName . ' == null) {');
        $parentFieldName = $this->model->tableName . '_' . $this->fieldName;
        $loadFunction->add('$this->' . $this->variableName . ' = new ' . $this->getExternalTypeClassName() . '($this, "' . $parentFieldName . '");');
        $loadFunction->add('$this->' . $this->variableName . '->tableName = "' . $this->model->tableName . '";');
        $loadFunction->add('$this->' . $this->variableName . '->fieldName = "' . $this->fieldName . '";');
        $loadFunction->add('$this->' . $this->variableName . '->aliasFieldName = "' . $this->getAliasFieldName() . '";');
        $loadFunction->add('$this->' . $this->variableName . '->label = "' . $this->label . '";');

        if ($this->defaultValue !== null) {
            $loadFunction->add('$this->' . $this->variableName . '->defaultValue = ' . $this->defaultValue . ';');
        }

        $loadFunction->add('}');

        $loadFunction->add('return $this;');

        if ($this->loadModel) {
            $phpFunction->add('$this->' . $functionName . ';');
        }

    }


    protected function addExternalExternalCode(PhpClass $phpClass, PhpFunction $phpFunction, $className)
    {

        $className = $this->prefixClassName($className);

        $variable = new PhpVariable($phpClass);
        $variable->variableName = $this->getIdVariableName();
        $variable->dataType = $className;

        $phpFunction->add('$this->' . $this->getIdVariableName() . ' = new ' . $className . '();');
        $phpFunction->add('$this->' . $this->getIdVariableName() . '->fieldName = "' . $this->fieldName . '";');
        $phpFunction->add('$this->' . $this->getIdVariableName() . '->tableName = $this->parentFieldName . "_" . $this->externalTableName;');
        $phpFunction->add('$this->' . $this->getIdVariableName() . '->aliasFieldName = $this->' . $this->getIdVariableName() . '->tableName ."_".$this->' . $this->getIdVariableName() . '->fieldName;');
        $phpFunction->add('$this->' . $this->getIdVariableName() . '->label = "' . $this->label . '";');
        $phpFunction->add('$this->addType($this->' . $this->getIdVariableName() . ');');

        $variable = new PhpVariable($phpClass);
        $variable->variableName = $this->variableName;
        $variable->dataType = $this->getExternalTypeClassName();

        $functionName = 'load' . (new UppercaseFirstLetter())->uppercaseFirstLetter($this->variableName) . '()';

        $loadFunction = new PhpFunction($phpClass);
        $loadFunction->functionName = $functionName;
        $loadFunction->add('if ($this->' . $this->variableName . ' == null) {');
        $loadFunction->add('$this->' . $this->variableName . ' = new ' . $this->getExternalTypeClassName() . '(null, $this->parentFieldName . "_' . $this->fieldName . '");');

        $loadFunction->add('$this->' . $this->variableName . '->fieldName = "' . $this->fieldName . '";');
        $loadFunction->add('$this->' . $this->variableName . '->tableName = $this->parentFieldName . "_" . $this->externalTableName;');
        $loadFunction->add('$this->' . $this->variableName . '->aliasFieldName = $this->' . $this->variableName . '->tableName ."_".$this->' . $this->variableName . '->fieldName;');
        $loadFunction->add('$this->' . $this->variableName . '->label = "' . $this->label . '";');
        $loadFunction->add('$this->addType($this->' . $this->variableName . ');');
        $loadFunction->add('}');

        $loadFunction->add('return $this;');

    }

}