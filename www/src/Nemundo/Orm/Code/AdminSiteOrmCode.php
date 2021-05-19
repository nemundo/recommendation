<?php

namespace Nemundo\Orm\Code;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Model\Site\AbstractModelAdminSite;

class AdminSiteOrmCode extends AbstractOrmCode
{

    public function createClass()
    {

        $php = new PhpClass();
        $php->project = $this->project;
        $php->namespace = $this->model->namespace;
        $php->className = $this->model->className . 'AdminSite';
        $php->extendsFromClass = $this->prefixClassName(AbstractModelAdminSite::class);  // 'AbstractModelAdminSite';
        $php->overwriteExistingPhpFile = true;

        $php->addUseClass('Nemundo\Model\Site\AbstractModelAdminSite');

        $var = new PhpVariable($php);
        $var->variableName = 'model';
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = $this->model->className . 'Model';

        $function = new PhpFunction($php);
        $function->functionName = 'loadSite()';
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->add('$this->model = new ' . $this->model->className . 'Model();');
        $function->add('$this->title = $this->model->label;');
        $function->add('$this->url = $this->model->tableName;');

        $php->saveFile();

    }

}