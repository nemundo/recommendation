<?php

namespace Nemundo\App\ModelDesigner\Site\App;


use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Form\AppForm;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\AppSite;
use Nemundo\App\ModelDesigner\Site\ProjectSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;

class AppEditSite extends AbstractEditIconSite
{

    /**
     * @var AppEditSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'App Edit';
        $this->url = 'app-edit';

        AppEditSite::$site = $this;

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);


        $breadcrumb = new ModelDesignerBreadcrumb($page);
        $breadcrumb->addProject($project);
        $breadcrumb->addActiveItem($this->title);

        $form = new AppForm($page);
        $form->project = $project;
        $form->app = $app;
        $form->redirectSite = ProjectSite::$site;  // AppSite::$site;

        $page->render();


    }


}