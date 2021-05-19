<?php

namespace Nemundo\App\ModelDesigner\Site\Model;


use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Form\ModelForm;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\ModelSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class ModelNewSite extends AbstractSite
{

    /**
     * @var ModelNewSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'New Model';
        $this->url = 'model-new';

        ModelNewSite::$site = $this;

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);

        $breadcrumb = new ModelDesignerBreadcrumb($page);
        $breadcrumb->addProject($project);
        $breadcrumb->addApp($app);
        $breadcrumb->addActiveItem($this->title);

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new ModelForm($layout->col1);
        $form->app = $app;
        $form->redirectSite = clone(ModelSite::$site);
        $form->redirectSite->addParameter(new ProjectParameter());
        $form->redirectSite->addParameter(new AppParameter());

        $page->render();

    }

}