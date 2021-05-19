<?php


namespace Nemundo\Content\App\Dashboard\Action;


use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\App\Dashboard\Content\Dashboard\DashboardContentType;
use Nemundo\Content\Builder\ContentBuilder;
use Nemundo\Content\Index\Tree\Index\TreeIndexBuilder;

class DashboardContentAction extends AbstractContentAction
{

    public $dashboardId;

    protected function loadContentType()
    {

        $this->typeLabel = 'Add Dashboard';
        $this->typeId = '81bca014-2cf0-4189-9c5c-3e2c6231d9d3';
        $this->actionLabel = 'Add Dashboard';

        $this->formClassList[] = DashboardActionContentForm::class;
        $this->viewClassList[] = DashboardActionContentView::class;

    }


    public function onAction()
    {


        $content = (new ContentBuilder())->getContent($this->actionContentId);

        $builder = new TreeIndexBuilder($content);
        $builder->parentId = (new DashboardContentType($this->dashboardId))->getContentId();  // $this-> pare dashboard->getDashboardContentType()->getContentId();
        $builder->buildIndex();

        //new TreeIndexBuilder()


    }

}