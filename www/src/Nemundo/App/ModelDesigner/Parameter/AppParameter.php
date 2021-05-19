<?php

namespace Nemundo\App\ModelDesigner\Parameter;


use Nemundo\App\ModelDesigner\Json\AppJson;
use Nemundo\Project\AbstractProject;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class AppParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'app';
    }


    public function getApp(AbstractProject $project = null)
    {

        if ($project == null) {
            $project = (new ProjectParameter())->getProject();
        }

        $appJson = new AppJson();
        $appJson->fromProject($project, (new AppParameter())->getValue());


        return $appJson;

    }

}