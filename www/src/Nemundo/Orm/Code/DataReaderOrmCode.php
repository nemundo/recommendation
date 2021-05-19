<?php

namespace Nemundo\Orm\Code;


use Nemundo\Core\Check\ValueCheck;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Model\Reader\ModelDataReader;


class DataReaderOrmCode extends AbstractOrmCode
{

    public function createClass()
    {

        $php = new PhpClass();
        $php->project = $this->project;
        $php->namespace = $this->model->namespace;
        $php->className = $this->model->className . 'Reader';
        $php->extendsFromClass = $this->prefixClassName(ModelDataReader::class);

        $php->overwriteExistingPhpFile = true;

        $var = new PhpVariable($php);
        $var->variableName = 'model';
        $var->dataType = $this->model->className . 'Model';

        $php->addConstructor('parent::__construct();');
        $php->addConstructor('$this->model = new ' . $this->model->className . 'Model();');

        $rowClassName = $this->model->className . 'Row';

        if ((new ValueCheck())->hasValue($this->model->rowClassName)) {
            $rowClassName = '\\' . $this->model->rowClassName;
        }

        $function = new PhpFunction($php);
        $function->functionName = 'getData()';
        $function->returnDataType = $rowClassName . '[]';
        $function->add('$list = [];');
        $function->add('foreach (parent::getData() as $dataRow) {');
        $function->add('$row = $this->getModelRow($dataRow);');
        $function->add('$list[] = $row;');
        $function->add('}');
        $function->add('return $list;');

        $function = new PhpFunction($php);
        $function->functionName = 'getRow()';
        $function->returnDataType = $rowClassName;
        $function->add('$dataRow = parent::getRow();');
        $function->add('$row = $this->getModelRow($dataRow);');
        $function->add('return $row;');

        $function = new PhpFunction($php);
        $function->functionName = 'getRowById($id)';
        $function->returnDataType = $rowClassName;
        $function->add('return parent::getRowById($id);');

        $function = new PhpFunction($php);
        $function->functionName = 'getModelRow($dataRow)';
        $function->visibility = PhpVisibility::PrivateVariable;
        $function->add('$row = new ' . $rowClassName . '($dataRow, $this->model);');
        $function->add('$row->model = $this->model;');
        $function->add('return $row;');

        $php->saveFile();

    }

}