<?php

namespace Nemundo\App\ModelDesigner;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Project\AbstractProject;
use Nemundo\Project\Collection\AbstractProjectCollection;
use Nemundo\Project\Collection\ProjectCollection;

class ModelDesignerConfig extends AbstractBase
{

    /**
     * @var AbstractProjectCollection|ProjectCollection
     */
    private static $projectCollection;


    public function __construct()
    {

        if (ModelDesignerConfig::$projectCollection == null) {
            ModelDesignerConfig::$projectCollection = new ProjectCollection();
        }

    }


    public function addProject(AbstractProject $project)
    {

        ModelDesignerConfig::$projectCollection->addProject($project);

    }


    public function getProjectCollection()
    {

        return ModelDesignerConfig::$projectCollection;

    }


    public function getProjectList()
    {

        return ModelDesignerConfig::$projectCollection->getProjectList();

    }

}