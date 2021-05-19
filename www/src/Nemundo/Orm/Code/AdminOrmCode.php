<?php

namespace Nemundo\Orm\Code;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Model\Admin\AbstractModelAdmin;

class AdminOrmCode extends AbstractOrmCode
{

    public function createClass()
    {

        $php = new PhpClass();
        $php->project = $this->project;
        $php->namespace = $this->model->namespace;
        $php->className = $this->model->className . 'Admin';
        $php->extendsFromClass = $this->prefixClassName(AbstractModelAdmin::class);
        $php->overwriteExistingPhpFile = true;

        $var = new PhpVariable($php);
        $var->variableName = 'model';
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = $this->model->className . 'Model';

        $function = new PhpFunction($php);
        $function->functionName = 'loadContainer()';
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->add('parent::loadContainer();');
        $function->add('$this->model = new  ' . $this->model->className . 'Model();');

        $php->saveFile();

    }

}