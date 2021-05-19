<?php

namespace Nemundo\App\ModelDesigner\Site\Type;


use Nemundo\App\ModelDesigner\Builder\TypeBuilder;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Form\TypeForm;
use Nemundo\App\ModelDesigner\Page\Type\TypeEditPage;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\FieldNameParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\ModelSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;

class TypeEditSite extends AbstractEditIconSite
{

    /**
     * @var TypeEditSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Type Edit';
        $this->url = 'type-edit';

        TypeEditSite::$site = $this;

    }


    public function loadContent()
    {

        (new TypeEditPage())->render();

        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $project = (new ProjectParameter())->getProject();
        $appJson = (new AppParameter())->getApp($project);
        $model = (new ModelParameter())->getModel($appJson);

        $breadcrumb = new ModelDesignerBreadcrumb($page);
        $breadcrumb->addProject($project);
        $breadcrumb->addApp($appJson);
        $breadcrumb->addModel($model);
        $breadcrumb->addActiveItem($this->title);

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new TypeForm($layout->col1);
        $form->project = $project;
        $form->appJson = $appJson;
        $form->model = $model;
        $form->type = (new TypeBuilder())->getTypeFromModel($model, (new FieldNameParameter())->getValue());
        $form->redirectSite = clone(ModelSite::$site);
        $form->redirectSite->addParameter(new ProjectParameter());
        $form->redirectSite->addParameter(new AppParameter());
        $form->redirectSite->addParameter(new ModelParameter());
        $form->updateMode = true;

        $page->render();*/

    }

}