<?php

namespace Nemundo\App\ModelDesigner\Site\App;


use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Form\AppForm;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\AppSite;
use Nemundo\Core\Debug\Debug;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class AppNewSite extends AbstractSite
{

    /**
     * @var AppNewSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'New App';
        $this->url = 'app-new';

        AppNewSite::$site = $this;

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $project = (new ProjectParameter())->getProject();

        $breadcrumb = new ModelDesignerBreadcrumb($page);
        $breadcrumb->addProject($project);
        $breadcrumb->addActiveItem($this->title);

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new AppForm($layout->col1);
        $form->project = $project;
        $form->redirectSite = AppSite::$site;

        $page->render();

    }

}