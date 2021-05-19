<?php

namespace Nemundo\App\Mail\Page;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\App\Mail\Data\MailServer\MailServerReader;
use Nemundo\App\Mail\Form\MailServerForm;
use Nemundo\App\Mail\Parameter\MailServerParameter;
use Nemundo\App\Mail\Site\ConfigSite;
use Nemundo\App\Mail\Site\MailServerDeleteSite;
use Nemundo\App\Mail\Template\MailTemplate;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class ConfigPage extends MailTemplate
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $table = new AdminClickableTable($layout->col1);

        $reader = new MailServerReader();

        $header = new AdminTableHeader($table);
        $header->addText($reader->model->active->label);
        $header->addText($reader->model->host->label);
        $header->addText($reader->model->port->label);
        $header->addText($reader->model->authentication->label);
        $header->addText($reader->model->user->label);
        $header->addText($reader->model->password->label);
        $header->addText($reader->model->mailAddress->label);
        $header->addText($reader->model->mailText->label);
        $header->addEmpty();
        $header->addEmpty();

        foreach ($reader->getData() as $mailServerRow) {

            $row = new AdminClickableTableRow($table);
            $row->addYesNo($mailServerRow->active);
            $row->addText($mailServerRow->host);
            $row->addText($mailServerRow->port);
            $row->addYesNo($mailServerRow->authentication);
            $row->addText($mailServerRow->user);
            $row->addText($mailServerRow->password);
            $row->addText($mailServerRow->mailAddress);
            $row->addText($mailServerRow->mailText);

            $site=clone(ConfigSite::$site);  //MailServerEdDeleteSite::$site);
            $site->addParameter(new MailServerParameter($mailServerRow->id));
            $row->addSite($site);


            $site=clone(MailServerDeleteSite::$site);
            $site->addParameter(new MailServerParameter($mailServerRow->id));
            $row->addIconSite($site);


        }


        $form = new MailServerForm($layout->col2);
        $form->redirectSite = ConfigSite::$site;

        $parameter=new MailServerParameter();
        if ($parameter->hasValue()) {
        $form->dataId =$parameter->getValue();
        }



        return parent::getContent();
    }
}