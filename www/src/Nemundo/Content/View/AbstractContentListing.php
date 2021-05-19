<?php

namespace Nemundo\Content\View;

use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\DataIdParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Web\Site\AbstractSite;


abstract class AbstractContentListing extends AbstractHtmlContainer
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    /**
     * @var AbstractSite
     */
    public $redirectSite;


    // getDataRedirectSite
    protected function getRedirectSite($dataId)
    {

        $site = clone($this->redirectSite);
        $site->addParameter(new DataIdParameter($dataId));

        return $site;

    }


    protected function getContentRedirectSite($contentId)
    {

        $site = clone($this->redirectSite);
        $site->addParameter(new ContentParameter($contentId));

        return $site;

    }


}