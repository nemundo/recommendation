<?php

namespace Nemundo\Content\App\Contact\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Contact\Content\Contact\ContactContentType;
use Nemundo\Content\App\Contact\Data\ContactIndex\ContactIndexPaginationReader;
use Nemundo\Content\Index\Group\User\UserContentType;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\User\Session\UserSession;
use Nemundo\User\Type\UserSessionType;

class ContactPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $userType = new UserContentType((new UserSession())->userId);

        $contentType =new ContactContentType();
        $contentType->parentId=$userType->getContentId();
        $contentType->getDefaultForm($layout->col2);


        $table = new AdminTable($layout->col1);

        $contactIndexReader = new ContactIndexPaginationReader();
        $contactIndexReader->model->loadContent();
        $contactIndexReader->model->content->loadContentType();
        $contactIndexReader->model->loadSource();
        $contactIndexReader->model->source->loadContentType();
        $contactIndexReader->addOrder($contactIndexReader->model->lastName);
        $contactIndexReader->addOrder($contactIndexReader->model->firstName);

        $header = new TableHeader($table);
        $header->addText($contactIndexReader->model->company->label);
        $header->addText($contactIndexReader->model->lastName->label);
        $header->addText($contactIndexReader->model->firstName->label);
        $header->addText($contactIndexReader->model->source->label);

        foreach ($contactIndexReader->getData() as $contactRow) {

            $row = new TableRow($table);
            $row->addText($contactRow->company);
            $row->addText($contactRow->lastName);
            $row->addText($contactRow->firstName);
            //$row->addText($contactRow->source->contentType->getContentType()->getSubject());
            $row->addText($contactRow->source->contentType->contentType);


        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $contactIndexReader;


        return parent::getContent();
    }
}