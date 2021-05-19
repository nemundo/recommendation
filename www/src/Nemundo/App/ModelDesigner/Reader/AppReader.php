<?php

namespace Nemundo\App\ModelDesigner\Reader;


use Nemundo\App\ModelDesigner\Json\AppJson;
use Nemundo\App\ModelDesigner\Json\ProjectJson;
use Nemundo\App\ModelDesigner\ModelDesignerConfig;
use Nemundo\Core\Base\DataSource\AbstractDataSource;

class AppReader extends AbstractDataSource
{

    /**
     * @return AppJson[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        $projectCollection = (new ModelDesignerConfig())->getProjectCollection();
        foreach ($projectCollection->getProjectList() as $project) {
            $projectJson = new ProjectJson($project);
            foreach ($projectJson->getAppJsonList() as $appJson) {
                $this->addItem($appJson);
            }
        }

    }

}