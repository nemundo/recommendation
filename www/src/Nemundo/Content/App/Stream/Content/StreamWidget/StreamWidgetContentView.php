<?php

namespace Nemundo\Content\App\Stream\Content\StreamWidget;

use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Content\App\Stream\Data\Stream\StreamReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Block\Br;

class StreamWidgetContentView extends AbstractContentView
{
    /**
     * @var StreamWidgetContentType
     */
    public $contentType;

    protected function loadView()
    {
        $this->viewName = 'default';
        $this->viewId = '3bb17098-ece8-4593-af33-af61df13382e';
        $this->defaultView = true;
    }

    public function getContent()
    {


        $streamReader = new StreamReader();
        $streamReader->model->loadContent();
        $streamReader->model->content->loadContentType();
        $streamReader->addOrder($streamReader->model->id, SortOrder::DESCENDING);


        foreach ($streamReader->getData() as $streamRow) {

            $contentType = $streamRow->content->getContentType();

            $subtitle=new AdminSubtitle($this);
            $subtitle->content = $contentType->getSubject();

            $contentType->getDefaultView($this);

            (new Br($this));

            /*
            $contentType = $streamRow->content->getContentType();


            $widget = new ContentWidget($this);
            $widget->contentType = $contentType;
            $widget->viewId=$contentType->getDefaultViewId();
            $widget->addCssClass(BootstrapSpacing::MARIGN_BOTTOM_3);
*/


        }


        return parent::getContent();

    }
}