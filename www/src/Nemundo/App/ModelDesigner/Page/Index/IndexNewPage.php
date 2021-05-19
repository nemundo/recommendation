<?php


namespace Nemundo\App\ModelDesigner\Page\Index;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Form\IndexForm;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\Index\IndexNewSite;
use Nemundo\App\ModelDesigner\Site\ModelSite;
use Nemundo\App\ModelDesigner\Template\ModelDesignerTemplate;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class IndexNewPage extends ModelDesignerTemplate
{

    public function getContent()
    {

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);
        $model = (new ModelParameter())->getModel($app);

        $breadcrumb = new ModelDesignerBreadcrumb($this);
        $breadcrumb->addProject($project);
        $breadcrumb->addApp($app);
        $breadcrumb->addModel($model);
        $breadcrumb->addActiveItem(IndexNewSite::$site->title);  // $this->title);



        $title = new AdminTitle($this);
        $title->content =IndexNewSite::$site->title;  // $this->title;



        $layout = new BootstrapTwoColumnLayout($this);




        $form = new IndexForm($layout->col1);
        $form->redirectSite = ModelSite::$site;
        $form->redirectSite->addParameter(new ProjectParameter());
        $form->redirectSite->addParameter(new AppParameter());
        $form->redirectSite->addParameter(new ModelParameter());


        return parent::getContent(); // TODO: Change the autogenerated stub
    }

}