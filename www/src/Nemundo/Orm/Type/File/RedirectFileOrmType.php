<?php

namespace Nemundo\Orm\Type\File;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Model\Data\Property\File\FileDataProperty;
use Nemundo\Model\Reader\Property\File\RedirectFileReaderProperty;
use Nemundo\Model\Type\File\RedirectFileType;
use Nemundo\Orm\Type\OrmTypeTrait;
use Nemundo\Orm\Utility\RedirectVariableName;

class RedirectFileOrmType extends RedirectFileType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Redirect File';
        $this->typeId = 'd5b5c006-449c-4fc9-9bd4-4d385552d7b9';
    }

    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, RedirectFileType::class);

        $variableName = new RedirectVariableName();
        $variableName->model = $this->model;
        $variableName->type = $this;
        $registerVariableName = $variableName->getVariableName();

        $phpFunction->add('$this->' . $this->variableName . '->redirectSite = \\' . $this->model->namespace . '\\Redirect\\' . $this->model->className . 'RedirectConfig::$' . $registerVariableName . ';');

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {
        $this->addExternlObject($phpClass, $phpFunction, RedirectFileType::class);
    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addDataProperty($phpClass, FileDataProperty::class);

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $propertyClassName = $this->prefixClassName(RedirectFileReaderProperty::class);

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->dataType = $propertyClassName;

        $phpClass->addConstructor('$this->' . $this->variableName . ' = new ' . $propertyClassName . '($row, $model->' . $this->variableName . ', $this->id);');

    }
}