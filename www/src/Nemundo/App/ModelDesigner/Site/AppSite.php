<?php

namespace Nemundo\App\ModelDesigner\Site;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Table\ModelTable;
use Nemundo\App\ModelDesigner\Page\AppPage;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\App\AppEditSite;
use Nemundo\App\ModelDesigner\Site\Model\ModelEditSite;
use Nemundo\App\ModelDesigner\Site\Model\ModelNewSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class AppSite extends AbstractSite
{

    /**
     * @var AppSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'app';
        $this->menuActive = false;
        AppSite::$site = $this;

        new ModelNewSite($this);
        new ModelEditSite($this);

    }


    public function loadContent()
    {

        (new AppPage())->render();

        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $project = (new ProjectParameter())->getProject();
        $appJson = (new AppParameter())->getApp($project);

        $breadcrumb = new ModelDesignerBreadcrumb($page);
        $breadcrumb->addProject($project);
        $breadcrumb->addActiveItem($appJson->appLabel);

        $btn = new AdminIconSiteButton();
        $btn->site = clone(AppEditSite::$site);
        $btn->site->addParameter(new ProjectParameter());
        $btn->site->addParameter(new AppParameter($appJson->appName));

        $title = new AdminTitle($page);
        $title->content = $appJson->appLabel . ' ' . $btn->getContent()->bodyContent;

        $table = new AdminLabelValueTable($page);
        $table->addLabelValue('App', $appJson->appLabel);
        $table->addLabelValue('App Name', $appJson->appName);
        $table->addLabelValue('Namespace', $appJson->namespace);
        $table->addLabelValue('Json Filename',$appJson->getJsonFilename());

        $btn = new AdminSiteButton($page);
        $btn->site = ModelNewSite::$site;
        $btn->site->addParameter(new ProjectParameter());
        $btn->site->addParameter(new AppParameter());

        $btn = new AdminSiteButton($page);
        $btn->site = OrmBuilderSite::$site;
        $btn->site->addParameter(new ProjectParameter());
        $btn->site->addParameter(new AppParameter());

        /*$table = new ModelTable($page);
        $table->app = $appJson;
        $table->hideDeletedItems=true;*/

  /*      $table = new ModelTable($page);
        $table->app = $appJson;
        $table->hideDeletedItems=false;

        $page->render();*/

    }

}