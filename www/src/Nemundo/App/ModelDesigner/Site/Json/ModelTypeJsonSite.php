<?php


namespace Nemundo\App\ModelDesigner\Site\Json;


use Nemundo\App\ModelDesigner\Json\ProjectJson;
use Nemundo\App\ModelDesigner\ModelDesignerConfig;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Type\ModelDesignerTypeTrait;
use Nemundo\Core\Type\AbstractType;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Orm\Type\OrmTypeTrait;
use Nemundo\Web\Site\AbstractJsonSite;

class ModelTypeJsonSite extends AbstractJsonSite
{

    /**
     * @var ModelTypeJsonSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'model-type-json';
        ModelTypeJsonSite::$site = $this;
    }


    protected function loadJson()
    {

        $modelId = (new ModelParameter())->getValue();
        $model = null;

        $projectCollection = (new ModelDesignerConfig())->getProjectCollection();
        foreach ($projectCollection->getProjectList() as $project) {

            $projectJson = new ProjectJson($project);
            foreach ($projectJson->getAppJsonList() as $appJson) {

                foreach ($appJson->getModelList() as $modelItem) {

                    if ($modelItem->modelId == $modelId) {
                        $model = $modelItem;
                    }

                }

            }

        }

        /** @var AbstractModelType|AbstractType|ModelDesignerTypeTrait|OrmTypeTrait $type */
        foreach ($model->getTypeList(false, false) as $type) {

            $data = [];
            $data['name'] = $type->fieldName;
            $data['label'] = $type->label;
            $this->addJsonRow($data);

        }

    }

}