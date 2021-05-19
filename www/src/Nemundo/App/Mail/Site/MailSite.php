<?php

namespace Nemundo\App\Mail\Site;


use Nemundo\App\Mail\Page\MailPage;
use Nemundo\Web\Site\AbstractSite;


class MailSite extends AbstractSite
{

    /**
     * @var MailSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Mail';
        $this->url = 'mail';

MailSite::$site=$this;

        //new MailQueueDetailSite($this);
        //  $this->test = new MailTestSite($this);

        new MailQueueDeleteSite($this);

        new TestMailSite($this);

        new ConfigSite($this);

        //new MailTestSite($this);

        //new MyMailQueueSite($this);


    }


    public function loadContent()
    {

        (new MailPage())->render();


        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $btn = new AdminSiteButton($page);
        $btn->content = 'Test Mail';
        $btn->site = $this->test;


        $form=new SearchForm($page);

        $formRow=new BootstrapRow($form);





        $table = new AdminClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('Send Status');
        $header->addText('Send Date/Time');
        $header->addText('To');
        $header->addText('Subject');
        $header->addText('Date/Time');

        $header->addEmpty();

        $mailQueueReader = new MailQueuePaginationReader();  // Mail new MailQueuePaginationModelReader();
        //$mailQueueReader->addOrder($mailQueueReader->model->dateTime, SortOrder::DESCENDING);
        $mailQueueReader->addOrder($mailQueueReader->model->id, SortOrder::DESCENDING);
        $mailQueueReader->paginationLimit =AppConfig::PAGINATION_LIMIT;

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
            $site->addParameter((new MailUrlParameter($mailQueueRow->id)));
            $row->addIconSite($site);

            $site = clone($this->detail);
            $site->addParameter((new MailUrlParameter($mailQueueRow->id)));
            $row->addClickableSite($site);

        }

        $pagination = new BootstrapPagination($page);
        $pagination->paginationReader = $mailQueueReader;

        $page->render();*/


    }


}