<?php

namespace Nemundo\Orm\Code;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;

class FormUpdateOrmCode extends AbstractOrmCode
{

    public function createClass()
    {

        $php = new PhpClass();
        $php->project = $this->project;
        $php->namespace = $this->model->namespace;
        $php->className = $this->model->className . 'FormUpdate';
        $php->extendsFromClass = 'ModelFormUpdate';
        $php->overwriteExistingPhpFile = true;

        $php->addUseClass('Nemundo\Model\Form\ModelFormUpdate');

        $var = new PhpVariable($php);
        $var->variableName = 'model';
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = $this->model->className . 'Model';

        $function = new PhpFunction($php);
        $function->functionName = 'loadContainer()';
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->add('$this->model = new ' . $this->model->className . 'Model();');

        /* $function = new PhpFunction($php);
         $function->functionName = 'onSubmit()';
         $function->visibility = PhpVisibility::ProtectedVariable;
         $function->add('return parent::onSubmit();');
         /*$function->add('foreach ($this->actionList as $action) {');
         $function->add('$reader = new '.$this->model->className.'Reader();');
         $function->add('$row = $reader->getRowById($this->updateId);');
         $function->add('$action->run($row);');
         $function->add('}');*/

        $php->saveFile();

    }

}