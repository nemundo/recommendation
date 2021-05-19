<?php

namespace Nemundo\Content\App\Stream\Site;

use Nemundo\Content\App\Stream\Page\StreamPage;
use Nemundo\Web\Site\AbstractSite;

class StreamSite extends AbstractSite
{

    /**
     * @var StreamSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Stream';
        $this->url = 'stream';
        StreamSite::$site = $this;

        //new StreamConfigSite($this);

    }

    public function loadContent()
    {

        (new StreamPage())->render();


        /*
        $page=(new DefaultTemplateFactory())->getDefaultTemplate();






        $layout = new BootstrapTwoColumnLayout($page);



//        $form= (new YouTubeContentType())->getForm($layout->col2);


        $list=new CmsAddDropdown($layout->col2);


        $contentTypeParameter = new ContentTypeParameter();
        $contentTypeParameter->contentTypeCheck = false;
        if ($contentTypeParameter->exists()) {

            $contentType = $contentTypeParameter->getContentType();
            //$contentType->parentId = $parentId;
            $contentType->addEvent(new StreamEvent());

            $form = $contentType->getDefaultForm($layout->col2);
            $form->appendParameter = false;
            $form->redirectSite = new Site();
            $form->redirectSite->removeParameter(new ContentTypeParameter());

        }







        $streamReader=new StreamPaginationReader();
        $streamReader->model->loadContent();
        $streamReader->model->content->loadContentType();
        $streamReader->addOrder($streamReader->model->id, SortOrder::DESCENDING);
        $streamReader->paginationLimit= ProcessConfig::PAGINATION_LIMIT;

        foreach ($streamReader->getData() as $streamRow) {


            $contentType= $streamRow->content->getContentType();


            $card=new AdminCard($layout->col1);
            $card->title = $contentType->getSubject().' '.$contentType->dateTime->getShortDateTimeLeadingZeroFormat();

            //$subtitle=new AdminSubtitle($layout->col1);
            //$subtitle->content=$contentType->dateTime->getShortDateTimeLeadingZeroFormat();

            $contentType->getDefaultView($card);

        }


        $pagination=new BootstrapPagination($layout->col1);
        $pagination->paginationReader=$streamReader;



        $page->render();*/


    }
}