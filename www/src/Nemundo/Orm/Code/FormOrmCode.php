<?php

namespace Nemundo\Orm\Code;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Package\Bootstrap\Form\BootstrapModelForm;

class FormOrmCode extends AbstractOrmCode
{


    public function createClass()
    {

        $php = new PhpClass();
        $php->project = $this->project;
        $php->namespace = $this->model->namespace;
        $php->className = $this->model->className . 'Form';
        $php->extendsFromClass = $this->prefixClassName(BootstrapModelForm::class);
        $php->overwriteExistingPhpFile = true;

        $var = new PhpVariable($php);
        $var->variableName = 'model';
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = $this->model->className . 'Model';

        $function = new PhpFunction($php);
        $function->functionName = 'loadContainer()';
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->add('$this->model = new ' . $this->model->className . 'Model();');

        /*
        $function = new PhpFunction($php);
        $function->functionName = 'onSubmit()';
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->add('return parent::onSubmit();');*/

        $php->saveFile();

    }

}