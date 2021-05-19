<?php

namespace Nemundo\App\ModelDesigner\Builder;


use Nemundo\App\ModelDesigner\Json\ProjectJson;
use Nemundo\App\ModelDesigner\ModelDesignerConfig;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Orm\Model\AbstractOrmModel;

class ModelBuilder extends AbstractBase
{

    /** @var AbstractOrmModel[] $list */
    private static $modelCache;

    public function getModelList()
    {

        if (ModelBuilder::$modelCache == null) {

            ModelBuilder::$modelCache = [];

            $projectCollection = (new ModelDesignerConfig())->getProjectCollection();
            foreach ($projectCollection->getProjectList() as $project) {

                $projectJson = new ProjectJson($project);
                $projectJson->loadType = false;

                foreach ($projectJson->getAppJsonList() as $appJson) {

                    foreach ($appJson->getModelList() as $model) {

                        ModelBuilder::$modelCache[] = $model;

                    }

                }

            }
            
        }

        return ModelBuilder::$modelCache;

    }


    public function getModelById($modelId)
    {

        $value = null;
        foreach ($this->getModelList() as $model) {

            if ($model->modelId == $modelId) {
                $value = $model;
            }

        }

        return $value;

    }

}