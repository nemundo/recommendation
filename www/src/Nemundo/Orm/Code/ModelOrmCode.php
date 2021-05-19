<?php

namespace Nemundo\Orm\Code;


use Nemundo\Db\Index\AutoIncrementIdPrimaryIndex;
use Nemundo\Db\Index\NumberIdPrimaryIndex;
use Nemundo\Db\Index\TextIdPrimaryIndex;
use Nemundo\Db\Index\UniqueIdPrimaryIndex;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Orm\Type\OrmTypeTrait;


class ModelOrmCode extends AbstractOrmCode
{


    public function createClass()
    {

        $php = new PhpClass();
        $php->project = $this->project;
        $php->namespace = $this->model->namespace;
        $php->className = $this->model->className . 'Model';
        $php->extendsFromClass = $this->prefixClassName($this->model->templateExtendsClass);
        $php->overwriteExistingPhpFile = true;

        $function = new PhpFunction($php);
        $function->functionName = 'loadModel()';
        $function->visibility = PhpVisibility::ProtectedVariable;
        $function->add('$this->tableName = "' . $this->model->tableName . '";');
        $function->add('$this->aliasTableName = "' . $this->model->tableName . '";');
        $function->add('$this->label = "' . $this->model->label . '";');

        $function->addEmptyLine();

        switch ($this->model->primaryIndex->primaryIndexId) {

            case (new AutoIncrementIdPrimaryIndex)->primaryIndexId:
                $function->add('$this->primaryIndex = new ' . $this->prefixClassName(AutoIncrementIdPrimaryIndex::class) . '();');
                break;

            case (new UniqueIdPrimaryIndex)->primaryIndexId:
                $function->add('$this->primaryIndex = new ' . $this->prefixClassName(UniqueIdPrimaryIndex::class) . '();');
                break;

            case (new NumberIdPrimaryIndex)->primaryIndexId:
                $function->add('$this->primaryIndex = new ' . $this->prefixClassName(NumberIdPrimaryIndex::class) . '();');
                break;

            case (new TextIdPrimaryIndex)->primaryIndexId:
                $function->add('$this->primaryIndex = new ' . $this->prefixClassName(TextIdPrimaryIndex::class) . '();');
                break;

        }
        
        $function->addEmptyLine();
        
        /** @var OrmTypeTrait|AbstractModelType $type */
        foreach ($this->model->getTypeList() as $type) {

            $type->model = $this->model;
            $type->getModelCode($php, $function);

            $function->addEmptyLine();

        }
        
        foreach ($this->model->getIndexList() as $index) {

            $function->add('$index = new \\' . $index->getClassName() . '($this);');
            $function->add('$index->indexName = "' . $index->indexName . '";');

            foreach ($index->getTypeList() as $type) {

                if ($type->isObjectOfClass(ExternalOrmType::class)) {
                    $function->add('$index->addType($this->' . $type->variableName . 'Id);');
                } else {
                    $function->add('$index->addType($this->' . $type->variableName . ');');
                }

            }

            $function->addEmptyLine();

        }

        /** @var OrmTypeTrait $defaultType */
        foreach ($this->model->getDefaultTypeList() as $type) {
            if ($type->getClassName() == ExternalOrmType::class) {
                $function->add('$this->addDefaultType($this->' . $type->variableName . 'Id);');
            } else {
                $function->add('$this->addDefaultType($this->' . $type->variableName . ');');
            }
        }

        foreach ($this->model->getDefaultOrderList() as $order) {

            if ($type->getClassName() == ExternalOrmType::class) {
                $function->add('$this->addDefaultOrderType($this->' . $order->type->variableName . 'Id);');
            } else {
                $function->add('$this->addDefaultOrderType($this->' . $order->type->variableName . ');');
            }

        }

        $php->saveFile();

    }

}
