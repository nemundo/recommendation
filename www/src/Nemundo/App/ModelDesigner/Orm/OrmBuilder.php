<?php

namespace Nemundo\App\ModelDesigner\Orm;


use Nemundo\App\ModelDesigner\Json\AppJson;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Orm\Collection\CollectionOrm;
use Nemundo\Orm\Setup\OrmModelSetup;

class OrmBuilder extends AbstractBase
{

    /**
     * @var
     */
    public $project;

    /**
     * @var AppJson
     */
    public $app;

    public function createOrm()
    {

        foreach ($this->app->getModelList() as $model) {

            //(new Debug())->write('model='.$model->templateName);

            $orm = new OrmModelSetup();
            $orm->project = $this->project;
            $orm->model = $model;
            $orm->createOrm();
        }

        $orm = new CollectionOrm();
        $orm->project = $this->project;
        $orm->appName = $this->app->appLabel;
        $orm->namespace = $this->app->namespace;
        foreach ($this->app->getModelList() as $model) {
            $orm->addModel($model);
        }
        $orm->createCollection();

    }



    public function deleteOrm() {

        foreach ($this->app->getModelList() as $model) {
            $orm = new OrmModelSetup();
            $orm->project = $this->project;
            $orm->model = $model;
            $orm->deleteOrm();
        }


    }


}