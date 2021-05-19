<?php

namespace Nemundo\Orm\Collection;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Dev\Code\PhpClass;
use Nemundo\Dev\Code\PhpFunction;
use Nemundo\Dev\Code\PhpVisibility;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Project\AbstractProject;

class CollectionOrm extends AbstractBase
{

    /**
     * @var string
     */
    public $appName;

    /**
     * @var string
     */
    public $namespace;

    /**
     * @var AbstractProject
     */
    public $project;

    /**
     * @var AbstractOrmModel[]
     */
    private $modelList = [];

    public function addModel(AbstractOrmModel $model)
    {
        $this->modelList[] = $model;
        return $this;
    }


    public function createCollection()
    {

        $phpClass = new PhpClass();
        $phpClass->overwriteExistingPhpFile = true;
        $phpClass->project = $this->project;
        $phpClass->className = $this->appName . 'ModelCollection';
        $phpClass->namespace = $this->namespace . '\\' . 'Data';
        $phpClass->extendsFromClass = 'AbstractModelCollection';

        $phpClass->addUseClass('Nemundo\Model\Collection\AbstractModelCollection');

        $function = new PhpFunction($phpClass);
        $function->functionName = 'loadCollection()';
        $function->visibility = PhpVisibility::ProtectedVariable;

        foreach ($this->modelList as $model) {
            $className = '\\' . $model->namespace . '\\' . $model->className . 'Model';
            $function->add('$this->addModel(new ' . $className . '());');
        }

        $phpClass->saveFile();

    }

}