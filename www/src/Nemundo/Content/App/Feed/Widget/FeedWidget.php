<?php


namespace Nemundo\Content\App\Feed\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItemReader;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Content\App\Feed\Content\Item\FeedItemContentType;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItemPaginationReader;


class FeedWidget extends AdminWidget
{

    public function getContent()
    {


        $this->widgetTitle='Feed';

        $table = new AdminClickableTable($this);

        $itemReader = new FeedItemReader();
        $itemReader->model->loadFeed();
        $itemReader->addOrder($itemReader->model->dateTime,SortOrder::DESCENDING);
        $itemReader->limit=10;
        foreach ($itemReader->getData() as $itemRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($itemRow->title);
            //$row->addText($itemRow->description);
            //$row->addText($itemRow->dateTime->getShortDateTimeLeadingZeroFormat());
            $row->addText($itemRow->feed->title);

            $contentType = new FeedItemContentType($itemRow->id);
            $row->addClickableSite($contentType->getViewSite());

        }

        return parent::getContent();

    }

}