<?php

namespace Nemundo\Orm\Type\File;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Model\Data\Property\File\RedirectFilenameDataProperty;
use Nemundo\Model\Reader\Property\File\RedirectFilenameReaderProperty;
use Nemundo\Model\Type\File\RedirectFilenameType;
use Nemundo\Orm\Type\OrmTypeTrait;
use Nemundo\Orm\Utility\RedirectVariableName;

class RedirectFilenameOrmType extends RedirectFilenameType
{

    use OrmTypeTrait;

    protected function loadExternalType()
    {
        parent::loadExternalType();
        $this->typeLabel = 'Redirect Filename';
        $this->typeName = 'redirect_filename';
        $this->typeId = '9aabdb74-eaa7-4e63-bb0b-6f44d2981c89';
    }


    private function getAdditionalCode()
    {


        $variableName = new RedirectVariableName();
        $variableName->model = $this->model;
        $variableName->type = $this;
        $registerVariableName = $variableName->getVariableName();

        $code = [];
        $code[] = '$this->' . $this->variableName . '->redirectSite = \\' . $this->model->namespace . '\\Redirect\\' . $this->model->className . 'RedirectConfig::$' . $registerVariableName . ';';
        return $code;

    }


    public function getModelCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addModelObject($phpClass, $phpFunction, RedirectFilenameType::class);
        $phpFunction->add($this->getAdditionalCode());

    }


    public function getExternalCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addExternlObject($phpClass, $phpFunction, RedirectFilenameType::class, $this->getAdditionalCode());

    }


    public function getDataCode(PhpClass $phpClass, PhpFunction $phpFunction)
    {

        $this->addDataProperty($phpClass, RedirectFilenameDataProperty::class);

    }


    public function getRowCode(PhpClass $phpClass)
    {

        $propertyClassName = $this->prefixClassName(RedirectFilenameReaderProperty::class);

        $var = new PhpVariable($phpClass);
        $var->variableName = $this->variableName;
        $var->dataType = $propertyClassName;

        $phpClass->addConstructor('$this->' . $this->variableName . ' = new ' . $propertyClassName . '($row, $model->' . $this->variableName . ', $model->id);');

    }

}
