<?php

namespace Nemundo\App\ModelDesigner\Com\Breadcrumb;

use Nemundo\App\ModelDesigner\Json\AppJson;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\AppSite;
use Nemundo\App\ModelDesigner\Site\ModelDesignerSite;
use Nemundo\App\ModelDesigner\Site\ModelSite;
use Nemundo\App\ModelDesigner\Site\ProjectSite;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Package\Bootstrap\Breadcrumb\BootstrapBreadcrumb;
use Nemundo\Project\AbstractProject;

class ModelDesignerBreadcrumb extends BootstrapBreadcrumb
{

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->addSite(ModelDesignerSite::$site);

    }


    public function addProject(AbstractProject $project)
    {

        $site = clone(ProjectSite::$site);
        $site->title = $project->project;
        $site->addParameter(new ProjectParameter($project->projectName));
        $this->addSite($site);

    }


    public function addApp(AppJson $appJson)
    {

        $site = clone(AppSite::$site);
        $site->title = $appJson->appLabel;
        $site->addParameter(new ProjectParameter());
        $site->addParameter(new AppParameter());
        $this->addSite($site);

    }


    public function addModel(AbstractOrmModel $model)
    {

        $site = clone(ModelSite::$site);
        $site->title = $model->className;
        $site->addParameter(new ProjectParameter());
        $site->addParameter(new AppParameter());
        $site->addParameter(new ModelParameter($model->tableName));
        $this->addSite($site);

    }

}