<?php

namespace Nemundo\Content\App\Feed\Page\Admin;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\App\Feed\Data\Feed\FeedPaginationReader;
use Nemundo\Content\App\Feed\Parameter\FeedParameter;
use Nemundo\Content\App\Feed\Site\Admin\FeedDeleteSite;
use Nemundo\Content\App\Feed\Template\FeedAdminTemplate;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;

class FeedAdminPage extends FeedAdminTemplate
{
    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 8;
        $layout->col2->columnWidth = 4;

        $table = new AdminClickableTable($layout->col1);

        $header = new AdminTableHeader($table);
        $header->addText('Title');
        $header->addText('Description');
        $header->addText('Feed Url');
        $header->addEmpty();

        $feedReader = new FeedPaginationReader();
        $feedReader->addOrder($feedReader->model->title);
        foreach ($feedReader->getData() as $feedRow) {

            $row = new TableRow($table);
            $row->addText($feedRow->title);
            $row->addText($feedRow->description);
            $row->addText($feedRow->feedUrl);

            $site = clone(FeedDeleteSite::$site);
            $site->addParameter(new FeedParameter($feedRow->id));
            $row->addIconSite($site);

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $feedReader;

        return parent::getContent();

    }

}