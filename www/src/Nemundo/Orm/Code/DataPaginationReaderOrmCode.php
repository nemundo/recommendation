<?php

namespace Nemundo\Orm\Code;


use Nemundo\Core\Check\ValueCheck;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Model\Reader\AbstractPaginationModelDataReader;


class DataPaginationReaderOrmCode extends AbstractOrmCode
{

    public function createClass()
    {

        $php = new PhpClass();
        $php->project = $this->project;
        $php->namespace = $this->model->namespace;
        $php->className = $this->model->className . 'PaginationReader';
        $php->extendsFromClass = $this->prefixClassName(AbstractPaginationModelDataReader::class);  // 'AbstractOrmModelPaginationDataReader';
        $php->overwriteExistingPhpFile = true;


        $var = new PhpVariable($php);
        $var->variableName = 'model';
        $var->dataType = $this->model->className . 'Model';

        // Constructor
        $php->addConstructor('parent::__construct();');
        $php->addConstructor('$this->model = new ' . $this->model->className . 'Model();');

        $rowClassName = $this->model->className . 'Row';

        if ((new ValueCheck())->hasValue($this->model->rowClassName)) {
            $rowClassName = '\\' . $this->model->rowClassName;
        }

        // getData
        $function = new PhpFunction($php);
        $function->functionName = 'getData()';
        //$function->returnDataType = $this->model->className . 'Row[]';
        $function->returnDataType = $rowClassName . '[]';

        $function->add('$list = [];');
        $function->add('foreach (parent::getData() as $dataRow) {');
        //$function->add('$row = new ' . $this->model->className . 'Row($dataRow, $this->model);');
        $function->add('$row = new ' . $rowClassName . '($dataRow, $this->model);');

        $function->add('$list[] = $row;');
        $function->add('}');
        $function->add('return $list;');

        $php->saveFile();

    }

}