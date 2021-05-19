<?php

namespace Nemundo\App\ModelDesigner\Site;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\ClassDesigner\Site\ClassDesignerSite;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Table\ProjectTable;
use Nemundo\App\ModelDesigner\Page\ModelDesignerPage;
use Nemundo\App\ModelDesigner\Site\Model\ModelDeleteSite;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;

class ModelDesignerSite extends AbstractSite
{

    /**
     * @var ModelDesignerSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Model Designer';
        $this->url = 'model-designer';

        new ClassDesignerSite($this);

        new ProjectSite($this);
        new AppSite($this);
        new ModelSite($this);
        new ModelDeleteSite($this);
        new OrmBuilderSite($this);

        ModelDesignerSite::$site = $this;

    }


    public function loadContent()
    {

        (new ModelDesignerPage())->render();

        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $breadcrumb = new ModelDesignerBreadcrumb($page);

        $title = new AdminTitle($page);
        $title->content = 'Project List';

        new ProjectTable($page);

        $page->render();*/

    }

}