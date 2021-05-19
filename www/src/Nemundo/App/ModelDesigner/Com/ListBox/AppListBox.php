<?php

namespace Nemundo\App\ModelDesigner\Com\ListBox;


use Nemundo\App\ModelDesigner\Json\AppJson;
use Nemundo\App\ModelDesigner\Json\ProjectJson;
use Nemundo\App\ModelDesigner\ModelDesignerConfig;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class AppListBox extends BootstrapListBox
{

    public function getContent()
    {

        $this->label = 'App';

        $projectCollection = (new ModelDesignerConfig())->getProjectCollection();
        foreach ($projectCollection->getProjectList() as $project) {
            $projectJson = new ProjectJson($project);
            foreach ($projectJson->getAppJsonList() as $appJson) {
                $this->addItem($appJson->appName, $appJson->appLabel);
            }
        }

        return parent::getContent();

    }


    public function getApp() {


        /** @var AppJson $app */
        $app = null;

        $projectCollection = (new ModelDesignerConfig())->getProjectCollection();
        foreach ($projectCollection->getProjectList() as $project) {
            $projectJson = new ProjectJson($project);
            foreach ($projectJson->getAppJsonList() as $appJson) {
                //$this->addItem($appJson->appName, $appJson->appLabel);
                if ($appJson->appName == $this->getValue()) {
                    $app = $appJson;
                }
            }
        }

        return $app;

    }


}