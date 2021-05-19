<?php

namespace Nemundo\Orm\Code;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;


class DataIdValueOrmCode extends AbstractOrmCode
{

    public function createClass()
    {

        $php = new PhpClass();
        $php->project = $this->project;
        $php->namespace = $this->model->namespace;
        $php->className = $this->model->className . 'Id';
        $php->extendsFromClass = 'AbstractModelIdValue';
        $php->overwriteExistingPhpFile = true;

        $php->addUseClass('Nemundo\Model\Id\AbstractModelIdValue');

        $var = new PhpVariable($php);
        $var->variableName = 'model';
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = $this->model->className . 'Model';  // $this->model->className;

        $php->addConstructor('parent::__construct();');
        $php->addConstructor('$this->model = new ' . $this->model->className . 'Model();');

        $php->saveFile();

    }

}