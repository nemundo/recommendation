<?php

namespace Nemundo\App\Mail\Page;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\App\Mail\Data\MailQueue\MailQueuePaginationReader;
use Nemundo\App\Mail\Data\MailQueue\MailQueueReader;
use Nemundo\App\Mail\Parameter\MailParameter;
use Nemundo\App\Mail\Site\MailQueueDeleteSite;
use Nemundo\App\Mail\Site\MailSite;
use Nemundo\App\Mail\Template\MailTemplate;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Container\HtmlContainer;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class MailPage extends MailTemplate
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $table = new AdminClickableTable($layout->col1);

        $header = new AdminTableHeader($table);
        $header->addText('Send Status');
        $header->addText('Send Date/Time');
        $header->addText('To');
        $header->addText('Subject');
        $header->addText('Date/Time');

        $header->addEmpty();

        $mailQueueReader = new MailQueuePaginationReader();
        $mailQueueReader->addOrder($mailQueueReader->model->id, SortOrder::DESCENDING);
        foreach ($mailQueueReader->getData() as $mailQueueRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addYesNo($mailQueueRow->send);

            if ($mailQueueRow->send) {
                $row->addText($mailQueueRow->dateTimeSend->getShortDateTimeLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }

            $row->addText($mailQueueRow->mailTo);
            $row->addText($mailQueueRow->subject);
            $row->addText($mailQueueRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat());

            $site = clone(MailQueueDeleteSite::$site);
            $site->addParameter((new MailParameter($mailQueueRow->id)));
            $row->addIconSite($site);

            $site = clone(MailSite::$site);
            $site->addParameter((new MailParameter($mailQueueRow->id)));
            $row->addClickableSite($site);

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $mailQueueReader;


        $mailParameter = new MailParameter();
        if ($mailParameter->exists()) {

            $mailRow = (new MailQueueReader())->getRowById($mailParameter->getValue());

            $table = new AdminLabelValueTable($layout->col2);
            $table->addLabelValue('Subject', $mailRow->subject);
            $table->addLabelValue('To', $mailRow->mailTo);

            $container = new HtmlContainer($layout->col2);
            $container->addContent($mailRow->text);

        }

        return parent::getContent();

    }

}