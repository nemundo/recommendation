<?php

namespace Nemundo\Orm\Code;

use Nemundo\Db\Index\NumberIdPrimaryIndex;
use Nemundo\Db\Index\TextIdPrimaryIndex;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVariable;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Orm\Type\OrmTypeTrait;

abstract class AbstractDataOrmCode extends AbstractOrmCode
{


    /**
     * @var string
     */
    protected $dataClassName;

    /**
     * @var
     */
    protected $dataExtendsClass;


    public function createClass()
    {

        $phpClass = new PhpClass();
        $phpClass->project = $this->project;
        $phpClass->namespace = $this->model->namespace;
        $phpClass->className = $this->dataClassName;  // $this->model->className;
        //$phpClass->extendsFromClass = $this->prefixClassName(AbstractModelData::class);
        $phpClass->extendsFromClass = $this->prefixClassName($this->dataExtendsClass);


        $phpClass->overwriteExistingPhpFile = true;

        $var = new PhpVariable($phpClass);
        $var->variableName = 'model';
        $var->visibility = PhpVisibility::ProtectedVariable;
        $var->dataType = $this->model->className . 'Model';

        $phpClass->addConstructor('parent::__construct();');
        $phpClass->addConstructor('$this->model = new ' . $this->model->className . 'Model();');

        $function = new PhpFunction($phpClass);
        $function->functionName = 'save()';

        if ($this->model->primaryIndex->getClassName() == NumberIdPrimaryIndex::class) {

            $var = new PhpVariable($phpClass);
            $var->variableName = 'id';
            $var->dataType = 'int';

            $function->add('$id = $this->id;');
            $function->add('$this->typeValueList->setModelValue($this->model->id, $id);');

        }

        if ($this->model->primaryIndex->getClassName() == TextIdPrimaryIndex::class) {

            $var = new PhpVariable($phpClass);
            $var->variableName = 'id';
            $var->dataType = 'string';

            $function->add('$id = $this->id;');
            $function->add('$this->typeValueList->setModelValue($this->model->id, $id);');

        }

        /** @var OrmTypeTrait $type */
        foreach ($this->model->getTypeList() as $type) {
            $type->getDataCode($phpClass, $function);
        }

        $function->add('$id = parent::save();');

        /** @var OrmTypeTrait $type */
        foreach ($this->model->getTypeList() as $type) {
            $type->getDataAfterSaveCode($phpClass, $function);
        }

        $function->add('return $id;');

        $phpClass->saveFile();

    }

}
