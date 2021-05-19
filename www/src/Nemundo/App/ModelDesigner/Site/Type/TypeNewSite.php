<?php

namespace Nemundo\App\ModelDesigner\Site\Type;


use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Form\TypeForm;
use Nemundo\App\ModelDesigner\Page\Type\TypeNewPage;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Parameter\TypeParameter;
use Nemundo\App\ModelDesigner\Site\ModelSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Site\AbstractSite;

class TypeNewSite extends AbstractSite
{

    /**
     * @var TypeNewSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'New Type';
        $this->url = 'type-new';

        TypeNewSite::$site = $this;

    }


    public function loadContent()
    {

        (new TypeNewPage())->render();

        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $project = (new ProjectParameter())->getProject();
        $appJson = (new AppParameter())->getApp($project);
        $model = (new ModelParameter())->getModel($appJson);
        $type = (new TypeParameter())->getType();

        $breadcrumb = new ModelDesignerBreadcrumb($page);
        $breadcrumb->addProject($project);
        $breadcrumb->addApp($appJson);
        $breadcrumb->addModel($model);
        $breadcrumb->addActiveItem($this->title . ' (' . $type->typeLabel . ')');

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new TypeForm($layout->col1);
        $form->project = $project;
        $form->appJson = $appJson;
        $form->model = $model;
        $form->type = $type;
        $form->redirectSite = clone(ModelSite::$site);
        $form->redirectSite->addParameter(new ProjectParameter());
        $form->redirectSite->addParameter(new AppParameter());
        $form->redirectSite->addParameter(new ModelParameter());

        $page->render();*/

    }

}