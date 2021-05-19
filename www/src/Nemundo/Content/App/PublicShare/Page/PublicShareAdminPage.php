<?php

namespace Nemundo\Content\App\PublicShare\Page;

use Nemundo\Admin\Com\Copy\CopyTextBox;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Com\Template\AbstractTemplateDocument;

use Nemundo\Content\App\PublicShare\Com\PublicShareUrlContainer;
use Nemundo\Content\App\PublicShare\Com\PublicShareViewForm;
use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicSharePaginationReader;
use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicShareReader;
use Nemundo\Content\App\PublicShare\Parameter\PublicShareParameter;
use Nemundo\Content\App\PublicShare\Site\FullPagePublicShareSite;
use Nemundo\Content\App\PublicShare\Site\PublicShareDeleteSite;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\Site;

class PublicShareAdminPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        $table = new AdminClickableTable($layout->col1);

        $reader = new PublicSharePaginationReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();
        $reader->model->loadView();

        $header = new AdminTableHeader($table);
        $header->addText($reader->model->content->subject->label);
        $header->addText($reader->model->view->label);
        $header->addEmpty();
        $header->addEmpty();


        foreach ($reader->getData() as $publicShareRow) {

            $content = $publicShareRow->content->getContentType();

            if ($content!==null) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($publicShareRow->content->getContentType()->getSubject());
            $row->addText($publicShareRow->view->viewName);

            $input = new PublicShareUrlContainer($row);
            $input->shareId = $publicShareRow->id;



            $site = clone(FullPagePublicShareSite::$site);
            $site->addParameter(new PublicShareParameter($publicShareRow->id));

            $input = new CopyTextBox($row);
            $input->value = $site->getUrlWithDomain();




            $site = clone(PublicShareDeleteSite::$site);
            $site->addParameter(new PublicShareParameter($publicShareRow->id));
            $row->addIconSite($site);

            $site=new Site();
            $site->addParameter(new PublicShareParameter($publicShareRow->id));
            $row->addClickableSite($site);

            } else {

            }


        }


        $parameter=new PublicShareParameter();
        if ($parameter->hasValue()) {

            $reader = new PublicShareReader();
            $reader->model->loadContent();
            $reader->model->content->loadContentType();
            $reader->model->loadView();
            $row = $reader->getRowById($parameter->getValue());

            $p=new Paragraph($layout->col2);
            $p->content=$row->view->viewName;

            $form = new PublicShareViewForm($layout->col2);
            $form->publicShareRow = $row;
            $form->redirectSite = new Site();
            $form->redirectSite->addParameter($parameter);

            //$row->content->getContentType()->getView($row->viewId,$layout->col2);

            $widget=new ContentWidget($layout->col2);
            $widget->contentType =  $row->content->getContentType();
            $widget->viewId=$row->viewId;


        }



        return parent::getContent();
    }
}