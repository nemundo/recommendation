<?php

namespace Nemundo\App\ModelDesigner\Com\ListBox;


use Nemundo\App\ModelDesigner\ModelDesignerConfig;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\Core\System\ObjectBuilder;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Project\Collection\AbstractProjectCollection;


class ProjectListBox extends BootstrapListBox
{

    protected function loadContainer()
    {

        $this->label = 'Project';
        $this->name = (new ProjectParameter())->parameterName;
        $this->searchMode=true;

        /** @var AbstractProjectCollection $projectCollection */
        //$projectCollection = (new ObjectBuilder())->getObject(ModelDesignerConfig::$projectCollectionClass);

        //foreach ($projectCollection->getProjectList() as $project) {
        foreach ((new ModelDesignerConfig())->getProjectCollection()->getProjectList() as $project) {
            $this->addItem($project->projectName, $project->project . ' (' . $project->namespace . ')');
        }

        parent::loadContainer();

    }


    public function getProject()
    {

        $project = (new ProjectParameter())->getProject();
        return $project;

    }

}