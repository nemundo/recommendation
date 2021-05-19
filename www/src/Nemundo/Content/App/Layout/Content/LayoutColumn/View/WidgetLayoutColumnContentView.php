<?php

namespace Nemundo\Content\App\Layout\Content\LayoutColumn\View;

use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\App\Dashboard\Content\DashboardColumn\DashboardColumnContentType;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Reader\ChildContentReader;
use Nemundo\Content\Index\Tree\Reader\ChildContentTypeReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapColumn;
use Nemundo\Package\Bootstrap\Utility\BootstrapSpacing;

class WidgetLayoutColumnContentView extends AbstractContentView
{
    /**
     * @var DashboardColumnContentType
     */
    public $contentType;

    public $viewName='Widget View';

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $columnRow = $this->contentType->getDataRow();

        $column = new BootstrapColumn($this);
        $column->columnWidth = $columnRow->columnWidth;

        $child = new ChildContentReader();
        $child->contentType = $this->contentType;
        foreach ($child->getData() as $treeRow) {

            $content = $treeRow->child->getContentType();

            if ($content->hasView()) {

                $widget = new ContentWidget($column);
                $widget->contentType = $content;
                $widget->showMenu=false;
                $widget->editable=false;
                $widget->viewId=$treeRow->viewId;
                //$widget->loadAction=true;
                $widget->redirectSite = $this->redirectSite;


                $widget->addCssClass(BootstrapSpacing::MARIGN_BOTTOM_3);

            }

        }


        return parent::getContent();
    }

}