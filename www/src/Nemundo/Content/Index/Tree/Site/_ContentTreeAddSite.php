<?php

namespace Nemundo\Content\Index\Tree\Site;

use Nemundo\Com\Template\TemplateDocument;
use Nemundo\Content\Index\Group\Type\GroupTrait;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Event\WikiEvent;
use Nemundo\Wiki\Parameter\WikiPageParameter;
use Nemundo\Wiki\Site\WikiSite;

class ContentTreeAddSite extends AbstractSite
{

    /**
     * @var ContentTreeAddSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Content Add';
        $this->url = 'contenttypeadd';
        $this->menuActive = false;
        ContentTreeAddSite::$site = $this;
    }

    public function loadContent()
    {

        $page = new TemplateDocument();

        $wikiParameter =new WikiPageParameter();
        $wikiId = $wikiParameter->getValue();
        $wikiType = new WikiPageContentType($wikiId);

        $type = (new ContentTypeParameter())->getContentType();

        if ($type->isObjectOfTrait(GroupTrait::class)) {
            $type->groupId = $wikiType->getDataRow()->groupId;
        }

        $event = new WikiEvent();
        $event->pageId = $wikiId;
        $type->addEvent($event);
        //$type->parentId = $wikiType->getContentId();

        $form = $type->getDefaultForm($page);
        //$form->appendParameter = true;
        $form->redirectSite = clone(WikiSite::$site);
        $form->redirectSite->addParameter($wikiParameter);

//        $form->redirectSite = $wikiType->getViewSite();

        $page->render();


        /*
                $wikiType = new WikiPageContentType((new WikiParameter())->getValue());

                $type = (new ContentTypeParameter())->getContentType();
                $type->parentId = $wikiType->getContentId();
                $type->saveType();





                //$type->deleteType();

                /*
                        $contentId = (new ContentParameter())->getValue();

                        $contentReader = new ContentReader();
                        $contentReader->model->loadContentType();
                        $contentRow = $contentReader->getRowById($contentId);
                        $type = $contentRow->getContentType();
                        $type->deleteType();*/


        //(new UrlReferer())->redirect();

    }
}