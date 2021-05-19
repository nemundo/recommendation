<?php

namespace Nemundo\Orm\Code;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Orm\Type\OrmTypeTrait;


class DataUpdateOrmCode extends AbstractOrmCode
{

    public function createClass()
    {

        $phpClass = new PhpClass();
        $phpClass->project = $this->project;
        $phpClass->namespace = $this->model->namespace;
        $phpClass->className = $this->model->className . 'Update';
        $phpClass->extendsFromClass = 'AbstractModelUpdate';
        $phpClass->overwriteExistingPhpFile = true;

        $phpClass->addUseClass('Nemundo\Model\Data\AbstractModelUpdate');

        $var = new PhpVariable($phpClass);
        $var->variableName = 'model';
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = $this->model->className . 'Model';

        $phpClass->addConstructor('parent::__construct();');
        $phpClass->addConstructor('$this->model = new ' . $this->model->className . 'Model();');

        $function = new PhpFunction($phpClass);
        $function->functionName = 'update()';

        /** @var OrmTypeTrait $type */
        foreach ($this->model->getTypeList() as $type) {
            $type->getDataUpdateCode($phpClass, $function);
        }

        $function->add('parent::update();');

        $phpClass->saveFile();

    }
}
