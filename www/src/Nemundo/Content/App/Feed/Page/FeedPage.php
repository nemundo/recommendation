<?php

namespace Nemundo\Content\App\Feed\Page;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Content\App\Feed\Content\Item\FeedItemContentType;
use Nemundo\Content\App\Feed\Data\Feed\FeedReader;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItemPaginationReader;
use Nemundo\Content\App\Feed\Parameter\FeedParameter;
use Nemundo\Content\App\Feed\Site\FeedSite;
use Nemundo\Content\App\Feed\Template\FeedTemplate;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapSiteList;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class FeedPage extends FeedTemplate
{

    public function getContent()
    {

        $feedParameter = new FeedParameter();

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 2;
        $layout->col2->columnWidth = 10;


        $listing = new BootstrapSiteList($layout->col1);

        $reader = new FeedReader();
        foreach ($reader->getData() as $feedRow) {

            if ($feedParameter->getValue() == $feedRow->id) {
                $listing->addActiveText($feedRow->title);
            } else {
                $site = clone(FeedSite::$site);
                $site->title = $feedRow->title;
                $site->addParameter(new FeedParameter($feedRow->id));

                $listing->addSite($site);
            }

        }


        $table = new AdminClickableTable($layout->col2);

        $itemReader = new FeedItemPaginationReader();
        $itemReader->model->loadFeed();

        if ($feedParameter->hasValue()) {
            $itemReader->filter->andEqual($itemReader->model->feedId, $feedParameter->getValue());
        }


        $itemReader->addOrder($itemReader->model->dateTime, SortOrder::DESCENDING);
        //$itemReader->paginationLimit = ProcessConfig::PAGINATION_LIMIT;

        $header = new AdminTableHeader($table);
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