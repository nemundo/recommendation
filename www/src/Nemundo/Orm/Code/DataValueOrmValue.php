<?php

namespace Nemundo\Orm\Code;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Model\Value\AbstractModelDataValue;


class DataValueOrmValue extends AbstractOrmCode
{

    public function createClass()
    {

        $php = new PhpClass();
        $php->project = $this->project;
        $php->namespace = $this->model->namespace;
        $php->className = $this->model->className . 'Value';
        $php->extendsFromClass = $this->prefixClassName(AbstractModelDataValue::class);  // 'ModelDataValue';
        $php->overwriteExistingPhpFile = true;

        //$php->addUseClass('Nemundo\Model\Value\ModelDataValue');

        $var = new PhpVariable($php);
        $var->variableName = 'model';
        $var->dataType = $this->model->className . 'Model';

        $php->addConstructor('parent::__construct();');
        $php->addConstructor('$this->model = new ' . $this->model->className . 'Model();');

        $php->saveFile();

    }

}