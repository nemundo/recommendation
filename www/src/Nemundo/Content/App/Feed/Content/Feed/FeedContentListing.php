<?php

namespace Nemundo\Content\App\Feed\Content\Feed;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\Feed\Content\Item\FeedItemContentType;
use Nemundo\Content\App\Feed\Data\Feed\FeedPaginationReader;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItemPaginationReader;
use Nemundo\Content\View\AbstractContentListing;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class FeedContentListing extends AbstractContentListing
{

    public function getContent()
    {

        $table = new AdminClickableTable($this);


        $feedReader = new FeedPaginationReader();

        $header=new TableHeader($table);
        $header->addText($feedReader->model->title->label);
        $header->addText($feedReader->model->description->label);

        foreach ($feedReader->getData() as $itemRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($itemRow->title);
            $row->addText($itemRow->description);

            $contentType = new FeedItemContentType($itemRow->id);
            $row->addClickableSite($contentType->getViewSite());

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $feedReader;



        return parent::getContent();
    }

}