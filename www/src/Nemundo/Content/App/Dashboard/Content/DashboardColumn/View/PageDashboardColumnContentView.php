<?php

namespace Nemundo\Content\App\Dashboard\Content\DashboardColumn\View;

use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\App\Dashboard\Content\DashboardColumn\DashboardColumnContentType;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Reader\ChildContentReader;
use Nemundo\Content\Index\Tree\Reader\ChildContentTypeReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Debug\Debug;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapColumn;
use Nemundo\Package\Bootstrap\Utility\BootstrapSpacing;

class PageDashboardColumnContentView extends AbstractContentView
{
    /**
     * @var DashboardColumnContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewName='Page View';
        $this->viewId='ea727f64-98ad-4e5c-a9cc-c5d30803f3f9';
        $this->defaultView=false;

    }


    public function getContent()
    {

        $columnRow = $this->contentType->getDataRow();

        $column = new BootstrapColumn($this);
        $column->columnWidth = $columnRow->columnWidth;
        $column->addCssClass('bg-secondary');
        $column->addCssClass(BootstrapSpacing::MARIGN_3);

        $child = new ChildContentReader();
        $child->contentType = $this->contentType;
        foreach ($child->getData() as $treeRow) {

            $content = $treeRow->child->getContentType();

            if ($content->hasView()) {

                $content->getView($treeRow->viewId, $column);

                //(new Debug())->write($treeRow->viewId);

            }

        }


        return parent::getContent();
    }

}