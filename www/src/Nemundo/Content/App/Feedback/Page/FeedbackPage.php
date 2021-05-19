<?php

namespace Nemundo\Content\App\Feedback\Page;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Feedback\Content\Feedback\FeedbackContentType;
use Nemundo\Content\App\Feedback\Content\FeedbackWidget\FeedbackWidgetContentType;
use Nemundo\Content\App\Feedback\Data\Feedback\FeedbackPaginationReader;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;

class FeedbackPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $widget=new ContentWidget($this);
        $widget->contentType= new FeedbackWidgetContentType();


        $feedbackReader = new FeedbackPaginationReader();
        $feedbackReader->addOrder($feedbackReader->model->id, SortOrder::DESCENDING);

        $table = new AdminClickableTable($this);

        $header = new TableHeader($table);
        $header->addText($feedbackReader->model->contact->label);
        $header->addText($feedbackReader->model->email->label);
        $header->addText($feedbackReader->model->message->label);

        foreach ($feedbackReader->getData() as $feedbackRow) {

            $row = new TableRow($table);
            $row->addText($feedbackRow->contact);
            $row->addText($feedbackRow->email);
            $row->addText($feedbackRow->message);

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $feedbackReader;

        return parent::getContent();

    }

}