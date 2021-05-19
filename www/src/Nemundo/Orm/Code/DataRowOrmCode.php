<?php

namespace Nemundo\Orm\Code;

use Nemundo\Db\Row\AbstractDataRow;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Model\Row\AbstractModelDataRow;
use Nemundo\Orm\Type\OrmTypeTrait;

class DataRowOrmCode extends AbstractOrmCode
{

    public function createClass()
    {
        $php = new PhpClass();
        $php->project = $this->project;
        $php->namespace = $this->model->namespace;
        $php->className = $this->model->className . 'Row';
        $php->extendsFromClass = $this->prefixClassName(AbstractModelDataRow::class);
        $php->overwriteExistingPhpFile = true;

        $var = new PhpVariable($php);
        $var->variableName = 'row';
        $var->visibility = PhpVisibility::PrivateVariable;
        $var->dataType = $this->prefixClassName(AbstractModelDataRow::class);

        $var = new PhpVariable($php);
        $var->variableName = 'model';
        $var->visibility = PhpVisibility::PublicVariable;
        $var->dataType = $this->model->className . 'Model';

        $php->constructorParameter = $this->prefixClassName(AbstractDataRow::class) . ' $row, $model';
        $php->addConstructor('parent::__construct($row->getData());');
        $php->addConstructor('$this->row = $row;');

        /** @var OrmTypeTrait $type */
        foreach ($this->model->getTypeList() as $type) {
            $type->getRowCode($php);
        }

        $php->saveFile();

    }

}