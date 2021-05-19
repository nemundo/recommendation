<?php

namespace Nemundo\App\ModelDesigner\Site;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Table\AppTable;
use Nemundo\App\ModelDesigner\Page\ProjectPage;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\App\AppDeleteSite;
use Nemundo\App\ModelDesigner\Site\App\AppEditSite;
use Nemundo\App\ModelDesigner\Site\App\AppNewSite;
use Nemundo\App\ModelDesigner\Site\App\AppUndoDeleteSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class ProjectSite extends AbstractSite
{

    /**
     * @var ProjectSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Project';
        $this->url = 'project';
        $this->menuActive = false;

        new AppNewSite($this);
        new AppEditSite($this);
        new AppDeleteSite($this);
        new AppUndoDeleteSite($this);

        ProjectSite::$site = $this;

    }


    public function loadContent()
    {


        ModelDesignerSite::$site->showMenuAsActive=true;
        (new ProjectPage())->render();

        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $breadcrumb = new ModelDesignerBreadcrumb($page);

        $project = (new ProjectParameter())->getProject();


        $breadcrumb->addActiveItem($project->project);

        $btn = new AdminSiteButton($page);
        $btn->site = AppNewSite::$site;
        $btn->site->addParameter(new ProjectParameter());

        new AppTable($page);

        $page->render();*/

    }

}