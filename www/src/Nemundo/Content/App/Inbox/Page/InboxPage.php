<?php

namespace Nemundo\Content\App\Inbox\Page;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Inbox\Data\Inbox\InboxPaginationReader;
use Nemundo\Content\App\Inbox\Site\InboxSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\User\Session\UserSession;

class InboxPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $layout=new BootstrapTwoColumnLayout($this);

        $inboxReader=new InboxPaginationReader();
        $inboxReader->model->loadContent();
        $inboxReader->model->loadFrom();
        $inboxReader->filter->andEqual($inboxReader->model->userId,(new UserSession())->userId);
        $inboxReader->addOrder($inboxReader->model->id,SortOrder::DESCENDING);

        $table=new AdminClickableTable($layout->col1);

        $header=new TableHeader($table);
        $header->addText($inboxReader->model->content->subject->label);
        $header->addText($inboxReader->model->message->label);
        $header->addText($inboxReader->model->from->label);
        $header->addText($inboxReader->model->dateTime->label);

        foreach ($inboxReader->getData() as $inboxRow) {

            $row=new BootstrapClickableTableRow($table);

            $row->addText($inboxRow->content->subject);
            $row->addText((new Html( $inboxRow->message))->getValue());
            $row->addText($inboxRow->from->displayName);
            $row->addText($inboxRow->dateTime->getShortDateTimeLeadingZeroFormat());

            $site=clone(InboxSite::$site);
            $site->addParameter(new ContentParameter($inboxRow->contentId));
            $row->addClickableSite($site);

        }

        $pagination=new BootstrapPagination($layout->col1);
        $pagination->paginationReader=$inboxReader;


        $contentParameter=new ContentParameter();
        if ($contentParameter->hasValue()) {
            $contentType = $contentParameter->getContent(false);
            $contentType->getDefaultView($layout->col2);
        }

        return parent::getContent();

    }
}