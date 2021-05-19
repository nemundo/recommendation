<?php

namespace Nemundo\Content\App\Feed\Content\Item;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItemPaginationReader;
use Nemundo\Content\View\AbstractContentListing;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class FeedItemContentListing extends AbstractContentListing
{

    public function getContent()
    {


        // search

        // feed, type (audio/video/blog)

        // date (from/to)





        $table = new AdminClickableTable($this);


        $itemReader = new FeedItemPaginationReader();
        $itemReader->model->loadFeed();
        $itemReader->addOrder($itemReader->model->dateTime,SortOrder::DESCENDING);
        //$itemReader->paginationLimit = ProcessConfig::PAGINATION_LIMIT;

        $header=new TableHeader($table);
        $header->addText($itemReader->model->title->label);
        $header->addText($itemReader->model->description->label);
        $header->addText($itemReader->model->dateTime->label);
        $header->addText('Source');


        foreach ($itemReader->getData() as $itemRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($itemRow->title);
            $row->addText($itemRow->description);
            $row->addText($itemRow->dateTime->getShortDateTimeLeadingZeroFormat());
            $row->addText($itemRow->feed->title);

            $contentType = new FeedItemContentType($itemRow->id);
            $row->addClickableSite($contentType->getViewSite());

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $itemReader;

        return parent::getContent();

    }

}