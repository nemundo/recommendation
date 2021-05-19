<?php

namespace Nemundo\App\ModelDesigner\Parameter;


use Nemundo\App\ModelDesigner\Json\AppJson;
use Nemundo\App\ModelDesigner\ModelDesignerConfig;
use Nemundo\App\ModelDesigner\Path\ModelPath;
use Nemundo\Core\System\ObjectBuilder;
use Nemundo\Project\AbstractProject;
use Nemundo\Project\Collection\AbstractProjectCollection;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class ProjectParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'project';
    }


    public function getProject()
    {

        /** @var AbstractProject $value */
        $value = null;

        /** @var AbstractProjectCollection $projectCollection */
        //$projectCollection = (new ObjectBuilder())->getObject(ModelDesignerConfig::$projectCollectionClass);

        foreach ((new ModelDesignerConfig())->getProjectCollection()->getProjectList() as $project) {

            if ($project->projectName == $this->getValue()) {
                $value=$project;
            }

        }

        return $value;

    }


}