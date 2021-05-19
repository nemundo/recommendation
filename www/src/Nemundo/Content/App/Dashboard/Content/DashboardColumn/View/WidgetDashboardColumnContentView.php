<?php

namespace Nemundo\Content\App\Dashboard\Content\DashboardColumn\View;

use Nemundo\Content\App\Dashboard\Content\DashboardColumn\DashboardColumnContentType;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Reader\ChildContentReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapColumn;
use Nemundo\Package\Bootstrap\Utility\BootstrapSpacing;

class WidgetDashboardColumnContentView extends AbstractContentView
{
    /**
     * @var DashboardColumnContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName = 'Widget View';
        $this->viewId = '7a9f1cb2-6fe3-4562-8e96-0d23f035a943';
        $this->defaultView = true;

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
                $widget->showMenu = false;
                $widget->editable = false;
                $widget->viewEditable = false;
                $widget->viewId = $treeRow->viewId;
                //$widget->loadAction=true;
                $widget->redirectSite = $this->redirectSite;

                $widget->addCssClass(BootstrapSpacing::MARIGN_BOTTOM_3);

            }

        }

        return parent::getContent();

    }

}