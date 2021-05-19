<?php


namespace Nemundo\App\ModelDesigner\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\App\ClassDesigner\Site\ClassDesignerSite;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\AppSite;
use Nemundo\App\ModelDesigner\Site\ModelDesignerSite;
use Nemundo\Com\Template\AbstractTemplateDocument;

class ModelDesignerTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);


        $appParameter=new AppParameter();

        $site = null;
        $site = clone(ModelDesignerSite::$site);

        if ($appParameter->hasValue()) {
            $site= clone(AppSite::$site);
        }

        $site->title = ModelDesignerSite::$site->title;


        $site->addParameter(new ProjectParameter());
        $site->addParameter(new AppParameter());
        $nav->addSite($site);







        $site = clone(ClassDesignerSite::$site);
        $site->addParameter(new ProjectParameter());
        $site->addParameter(new AppParameter());
        $nav->addSite($site);

    }

}