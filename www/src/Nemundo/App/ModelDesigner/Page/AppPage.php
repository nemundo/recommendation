<?php


namespace Nemundo\App\ModelDesigner\Page;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Table\ModelTable;
use Nemundo\App\ModelDesigner\Com\Table\ProjectTable;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\App\AppEditSite;
use Nemundo\App\ModelDesigner\Site\Model\ModelNewSite;
use Nemundo\App\ModelDesigner\Site\OrmBuilderSite;
use Nemundo\App\ModelDesigner\Template\ModelDesignerTemplate;

class AppPage extends ModelDesignerTemplate
{

    public function getContent()
    {

        $project = (new ProjectParameter())->getProject();
        $appJson = (new AppParameter())->getApp($project);

        $breadcrumb = new ModelDesignerBreadcrumb($this);
        $breadcrumb->addProject($project);
        $breadcrumb->addActiveItem($appJson->appLabel);

        $btn = new AdminIconSiteButton();
        $btn->site = clone(AppEditSite::$site);
        $btn->site->addParameter(new ProjectParameter());
        $btn->site->addParameter(new AppParameter($appJson->appName));

        $title = new AdminTitle($this);
        $title->content = $appJson->appLabel . ' ' . $btn->getContent()->bodyContent;

        $table = new AdminLabelValueTable($this);
        $table->addLabelValue('App', $appJson->appLabel);
        $table->addLabelValue('App Name', $appJson->appName);
        $table->addLabelValue('Namespace', $appJson->namespace);
        $table->addLabelValue('Json Filename',$appJson->getJsonFilename());

        $btn = new AdminSiteButton($this);
        $btn->site = ModelNewSite::$site;
        $btn->site->addParameter(new ProjectParameter());
        $btn->site->addParameter(new AppParameter());

        $btn = new AdminSiteButton($this);
        $btn->site = OrmBuilderSite::$site;
        $btn->site->addParameter(new ProjectParameter());
        $btn->site->addParameter(new AppParameter());

        /*$table = new ModelTable($this);
        $table->app = $appJson;
        $table->hideDeletedItems=true;*/

        $table = new ModelTable($this);
        $table->app = $appJson;
        $table->hideDeletedItems=false;

        return parent::getContent();

    }


}