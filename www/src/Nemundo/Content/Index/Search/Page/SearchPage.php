<?php


namespace Nemundo\Content\Index\Search\Page;


use Nemundo\Com\Template\AbstractTemplateDocument;


use Nemundo\Content\Index\Search\Com\Container\SearchIndexContainer;
use Nemundo\Content\Site\ContentViewSite;

class SearchPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $contanier = new SearchIndexContainer($this);
        $contanier->redirectSite=ContentViewSite::$site;

        return parent::getContent();

    }

}