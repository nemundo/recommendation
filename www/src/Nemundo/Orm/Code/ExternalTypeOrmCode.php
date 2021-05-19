<?php

namespace Nemundo\Orm\Code;

use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Model\Type\External\ExternalType;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\OrmTypeTrait;

class ExternalTypeOrmCode extends AbstractOrmCode
{


    public function createClass()
    {

        $php = new PhpClass();
        $php->project = $this->project;
        $php->namespace = $this->model->namespace;
        $php->className = $this->model->className . 'ExternalType';
        $php->extendsFromClass = $this->prefixClassName(ExternalType::class);
        $php->overwriteExistingPhpFile = true;

        $function = new PhpFunction($php);
        $function->functionName = 'loadExternalType()';
        $function->visibility = PhpVisibility::ProtectedVariable;

        $function->add('parent::loadExternalType();');
        $function->add('$this->externalModelClassName = ' . $this->model->className . 'Model::class;');
        $function->add('$this->externalTableName = "' . $this->model->tableName . '";');
        $function->add('$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;');

        /** @var AbstractOrmModel|OrmTypeTrait $type */
        foreach ($this->model->getTypeList() as $type) {
            $type->getExternalCode($php, $function);
            $function->addEmptyLine();
        }

        $php->saveFile();

    }

}
