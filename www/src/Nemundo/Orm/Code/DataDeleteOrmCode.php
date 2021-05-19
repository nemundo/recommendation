<?php

namespace Nemundo\Orm\Code;


use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Model\Delete\AbstractModelDelete;


class DataDeleteOrmCode extends AbstractOrmCode
{


    public function createClass()
    {

        $php = new PhpClass();
        $php->project = $this->project;
        $php->namespace = $this->model->namespace;
        $php->className = $this->model->className . 'Delete';
        $php->extendsFromClass = $this->prefixClassName(AbstractModelDelete::class);  // 'AbstractModelDelete';
        $php->overwriteExistingPhpFile = true;

        //$php->addUseClass('Nemundo\Model\Data\AbstractModelDelete');

        $var = new PhpVariable($php);
        $var->variableName = 'model';
        $var->dataType = $this->model->className . 'Model'; // $this->model->className;

        $php->addConstructor('parent::__construct();');
        $php->addConstructor('$this->model = new ' . $this->model->className . 'Model();');

        $php->saveFile();

    }

}
