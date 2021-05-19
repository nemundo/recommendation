<?php

namespace Nemundo\Orm\Code;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;

class TableOrmCode extends AbstractOrmCode
{


    public function createClass()
    {


        $php = new PhpClass();
        $php->project = $this->project;
        $php->namespace = $this->model->namespace;
        $php->className = $this->model->className . 'Table';
        $php->extendsFromClass = 'BootstrapModelTable';
        $php->overwriteExistingPhpFile = true;

        $php->addUseClass('Nemundo\Package\Bootstrap\Table\BootstrapModelTable');

        $var = new PhpVariable($php);
        $var->variableName = 'model';
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = $this->model->className . 'Model';

        // loadCom
        $function = new PhpFunction($php);
        $function->functionName = 'loadContainer()';
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->add('$this->model = new ' . $this->model->className . 'Model();');

        $php->saveFile();

    }

}