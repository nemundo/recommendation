<?php

namespace Nemundo\App\ModelDesigner\Site\Index;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Form\IndexTypeForm;
use Nemundo\App\ModelDesigner\Com\Table\IndexTypeTable;
use Nemundo\App\ModelDesigner\Page\Index\IndexPage;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\IndexParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class IndexSite extends AbstractSite
{

    /**
     * @var IndexSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Index';
        $this->url = 'index';

        IndexSite::$site = $this;

        new IndexDeleteSite($this);
        new IndexTypeDeleteSite($this);

    }


    public function loadContent()
    {

        (new IndexPage())->render();

        /*
        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);
        $model = (new ModelParameter())->getModel($app);

        $index = (new IndexParameter())->getIndex($model);

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $breadcrumb = new ModelDesignerBreadcrumb($page);
        $breadcrumb->addProject($project);
        $breadcrumb->addApp($app);
        $breadcrumb->addModel($model);
        $breadcrumb->addActiveItem($this->title);


        $layout = new BootstrapTwoColumnLayout($page);

        $table = new AdminLabelValueTable($layout->col1);
        $table->addLabelValue('Index Label', $index->indexLabel);
        $table->addLabelValue('Index Type', $index->indexType);
        $table->addLabelValue('Index Name', $index->indexName);

        $form = new IndexTypeForm($layout->col1);
        $form->app = $app;
        $form->model = $model;
        $form->index = $index;
        $form->redirectSite = IndexSite::$site;
        $form->redirectSite->addParameter(new ProjectParameter());
        $form->redirectSite->addParameter(new AppParameter());
        $form->redirectSite->addParameter(new ModelParameter());
        $form->redirectSite->addParameter(new IndexParameter());


        $table = new IndexTypeTable($layout->col1);
        $table->index = $index;

        $page->render();*/


    }

}