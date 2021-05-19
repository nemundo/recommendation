<?php


namespace Nemundo\Orm\Type\External;


use Nemundo\Core\Check\ValueCheck;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;

class VirtualExternalOrmType extends ExternalOrmType
{

    protected function loadExternalType()
    {
        parent::loadExternalType();

        $this->typeLabel = 'External (Virtual)';
        $this->typeName = 'virtual_external';

    }


    /*
    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $externalModelClassName = $this->prefixClassName($this->externalClassName . 'Model');

        if ($this->externalModelClassName !== null) {
            $externalModelClassName = $this->externalModelClassName;
        }

        if (class_exists($externalModelClassName)) {

            $this->addExternalModelCode($phpClass, $phpFunction, $className);
        } else {
            (new LogMessage())->writeError($phpClass->className . ': Class does not exist. Class: ' . $externalModelClassName);

        }

    }*/


    protected function addExternalModelCode(PhpClass $phpClass, PhpFunction $phpFunction, $className)
    {

        $this->addLoadFunction($phpClass, $phpFunction);

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

    }


    public function getRowCode(PhpClass $phpClass)
    {

        /*$idVariableName = $this->variableName . 'Id';

        $var = new PhpVariable($phpClass);
        $var->variableName = $idVariableName;
        $var->dataType = 'string';

        $phpClass->addConstructor('$this->' . $idVariableName . ' = $this->getModelValue($model->' . $idVariableName . ');');*/

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


}