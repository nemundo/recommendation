<?php


namespace Nemundo\Content\App\Feed\Content\Feed;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\Feed\Content\Item\FeedItemContentType;
use Nemundo\Content\App\Feed\Data\Feed\FeedPaginationReader;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItemPaginationReader;
use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class FeedContentAdmin extends AbstractContentAdmin
{


    protected function loadIndex()
    {


        $feedReader = new FeedPaginationReader();
        $feedReader->addOrder($feedReader->model->title);

        $table = new AdminClickableTable($this);

        $header=new TableHeader($table);
        $header->addText($feedReader->model->title->label);
        $header->addText($feedReader->model->feedUrl->label);
        //$header->addText($feedReader->model->dateTime->label);
//        $header->addText('Source');
        $header->addEmpty();


        foreach ($feedReader->getData() as $itemRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($itemRow->title);
            $row->addText($itemRow->feedUrl);
            //$row->addText($itemRow->dateTime->getShortDateTimeLeadingZeroFormat());
            //$row->addText($itemRow->feed->title);

            //$contentType = new FeedItemContentType($itemRow->id);
            //$row->addClickableSite($contentType->getViewSite());

            $row->addIconSite($this->getDeleteSite($itemRow->id));

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $feedReader;

    }

}