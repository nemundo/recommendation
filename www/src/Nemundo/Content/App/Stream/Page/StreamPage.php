<?php

namespace Nemundo\Content\App\Stream\Page;


use Nemundo\Admin\Com\Card\AdminCard;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Html\Block\RestrictedDiv;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Action\EditContentAction;
use Nemundo\Content\App\Stream\Action\StreamDeleteContentAction;
use Nemundo\Content\App\Stream\Collection\StreamContentTypeCollection;
use Nemundo\Content\App\Stream\Com\Form\StreamForm;
use Nemundo\Content\App\Stream\Data\Stream\StreamPaginationReader;
use Nemundo\Content\App\Stream\Event\StreamEvent;
use Nemundo\Content\App\Stream\Site\StreamSite;
use Nemundo\Content\App\Stream\Usergroup\StreamUsergroup;
use Nemundo\Content\Com\Container\ContentTypeFormContainer;
use Nemundo\Content\Com\ListBox\ContentTypeCollectionListBox;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Index\Tree\Action\ViewChange\ViewChangeContentAction;
use Nemundo\Content\Index\Tree\Com\Form\RestrictedContentTypeForm;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Card\BootstrapCard;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Utility\BootstrapSpacing;
use Nemundo\User\Usergroup\UsergroupMembership;

class StreamPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        //$layout = new BootstrapTwoColumnLayout($this);


        $restrictedDiv= new AdminWidget($this);
        $restrictedDiv->widgetTitle='New';
        //$restrictedDiv = new RestrictedDiv($layout->col1);
        $restrictedDiv->restricted=true;
        $restrictedDiv->addRestrictedUsergroup(new StreamUsergroup());

        $form = new SearchForm($restrictedDiv);

        $listbox =new ContentTypeCollectionListBox($form);
        $listbox->contentTypeCollection=new StreamContentTypeCollection();
        $listbox->submitOnChange = true;
        $listbox->searchMode = true;


        $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->hasValue()) {


            $form = new StreamForm($restrictedDiv);
            $form->contentType=  $contentTypeParameter->getContentType();
            $form->redirectSite=StreamSite::$site;


            /*
            $form = new ContentTypeFormContainer($restrictedDiv);
            $form->contentType = $contentTypeParameter->getContentType();
            $form->contentType->addEvent(new StreamEvent());

            $form->contentType->getFormPart($restrictedDiv);*/

        }



/*
        $restrictedDiv = new RestrictedDiv($layout->col1);
        $restrictedDiv->restricted=true;
        $restrictedDiv->addRestrictedUsergroup(new StreamUsergroup());

        $form = new SearchForm($restrictedDiv);

        $listbox =new ContentTypeCollectionListBox($form);
        $listbox->contentTypeCollection=new StreamContentTypeCollection();
        $listbox->submitOnChange = true;
        $listbox->searchMode = true;


        $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->hasValue()) {

            $form = new ContentTypeFormContainer($restrictedDiv);
            $form->contentType = $contentTypeParameter->getContentType();
            $form->contentType->addEvent(new StreamEvent());

        }*/


        $streamReader = new StreamPaginationReader();
        $streamReader->model->loadUser();
        $streamReader->model->loadContent();
        $streamReader->model->content->loadContentType();
        $streamReader->addOrder($streamReader->model->id, SortOrder::DESCENDING);


        foreach ($streamReader->getData() as $streamRow) {

            $contentType = $streamRow->content->getContentType();

            $widget = new AdminWidget($this);  // new BootstrapCard($layout->col1);  // new ContentWidget($layout->col1);
            $widget->widgetTitle = $contentType->getSubject().' / '. $streamRow->user->displayName.' '.$streamRow->dateTime->getShortDateTimeLeadingZeroFormat();

            //$widget->addCssClass('m-3');

            if ($streamRow->hasMessage) {

                $p=new Paragraph($widget);
                $p->content=$streamRow->message;

            }

            $contentType->getDefaultView($widget);


            /*$widget->contentType = $contentType;
            $widget->viewId=$contentType->getDefaultViewId();

            $widget->actionDropdown->addContentAction(new EditContentAction());
            $widget->actionDropdown->addContentAction(new StreamDeleteContentAction());*/
            //$widget->actionDropdown->addContentAction(new ViewChangeContentAction());

            /*
            if ((new UsergroupMembership())->isMemberOfUsergroup(new StreamUsergroup())) {

            $widget->addContentAction(new EditContentAction());
            $widget->addContentAction(new StreamDeleteContentAction());
            $widget->addContentAction(new ViewChangeContentAction());

            } else {

                $widget->showMenu=false;
                $widget->viewEditable=false;

            }*/



            //$widget->widgetTitle = $contentType->getSubject() . ' - ' . $streamRow->dateTime->getShortDateTimeLeadingZeroFormat();


            //$widget->addCssClass(BootstrapSpacing::MARIGN_BOTTOM_3);


            //$p=new Paragraph($layout->col1);
            //$p->content = $streamRow->contentViewId;


            /*$card = new AdminCard($layout->col1);
            $card->title =
            $contentType->getSubject() . ' ' . $streamRow->dateTime->getShortDateTimeLeadingZeroFormat();

            $contentType->getDefaultView($card);*/

        }


        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $streamReader;








        return parent::getContent();

    }

}