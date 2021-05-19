<?php

namespace Nemundo\App\ModelDesigner\Site\Model;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Form\ModelForm;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\AppSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;

class ModelEditSite extends AbstractEditIconSite
{

    /**
     * @var ModelEditSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Edit Model';
        $this->url = 'model-edit';
        ModelEditSite::$site = $this;

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp();
        $model = (new ModelParameter())->getModel($app);

        $breadcrumb = new ModelDesignerBreadcrumb($page);
        $breadcrumb->addProject($project);
        $breadcrumb->addApp($app);
        $breadcrumb->addModel($model);
        $breadcrumb->addActiveItem('Edit');

        $title = new AdminTitle($page);
        $title->content = $this->title;

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new ModelForm($layout->col1);
        $form->app = $app;
        $form->model = $model;
        $form->redirectSite = AppSite::$site;
        $form->redirectSite->addParameter(new ProjectParameter());
        $form->redirectSite->addParameter(new AppParameter());
        $form->redirectSite->addParameter(new  ProjectParameter());

        $page->render();

    }

}