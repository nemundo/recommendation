<?php


namespace Nemundo\App\ModelDesigner\Page;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Table\AppTable;
use Nemundo\App\ModelDesigner\Com\Table\ProjectTable;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\App\AppNewSite;
use Nemundo\App\ModelDesigner\Site\ModelDesignerSite;
use Nemundo\App\ModelDesigner\Template\ModelDesignerTemplate;

class ProjectPage extends ModelDesignerTemplate
{

    public function getContent()
    {



        $breadcrumb = new ModelDesignerBreadcrumb($this);

        $project = (new ProjectParameter())->getProject();


        $breadcrumb->addActiveItem($project->project);

        $btn = new AdminSiteButton($this);
        $btn->site = AppNewSite::$site;
        $btn->site->addParameter(new ProjectParameter());

        new AppTable($this);

        return parent::getContent();

    }


}