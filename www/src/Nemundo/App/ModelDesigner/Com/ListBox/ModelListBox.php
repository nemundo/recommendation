<?php

namespace Nemundo\App\ModelDesigner\Com\ListBox;


use Nemundo\App\ModelDesigner\Json\ProjectJson;
use Nemundo\App\ModelDesigner\ModelDesignerConfig;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;


class ModelListBox extends BootstrapListBox
{

    public function getContent()
    {

        $this->label = 'Model';

        $list = [];

        $projectCollection = (new ModelDesignerConfig())->getProjectCollection();
        foreach ($projectCollection->getProjectList() as $project) {

            $projectJson = new ProjectJson($project);
            foreach ($projectJson->getAppJsonList() as $appJson) {

                foreach ($appJson->getModelList() as $model) {
                    $list[$model->modelId] = $model->className . ' (' . $appJson->appLabel . ')';
                }

            }

        }

        asort($list);
        foreach ($list as $key => $value) {
            $this->addItem($key, $value);
        }

        return parent::getContent();

    }

}