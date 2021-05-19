<?php

namespace Nemundo\App\ModelDesigner\Site\Index;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Form\IndexForm;
use Nemundo\App\ModelDesigner\Page\Index\IndexNewPage;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\ModelSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class IndexNewSite extends AbstractSite
{

    /**
     * @var IndexNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'New Index';
        $this->url = 'index-new';

        IndexNewSite::$site = $this;

    }


    public function loadContent()
    {

        (new IndexNewPage())->render();

        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);
        $model = (new ModelParameter())->getModel($app);


        $breadcrumb = new ModelDesignerBreadcrumb($page);
        $breadcrumb->addProject($project);
        $breadcrumb->addApp($app);
        $breadcrumb->addModel($model);
        $breadcrumb->addActiveItem($this->title);



        $title = new AdminTitle($page);
        $title->content = $this->title;



        $layout = new BootstrapTwoColumnLayout($page);




        $form = new IndexForm($layout->col1);
        $form->redirectSite = ModelSite::$site;
        $form->redirectSite->addParameter(new ProjectParameter());
        $form->redirectSite->addParameter(new AppParameter());
        $form->redirectSite->addParameter(new ModelParameter());


        $page->render();*/


    }

}