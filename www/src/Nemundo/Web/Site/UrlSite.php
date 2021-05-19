<?php

namespace Nemundo\Web\Site;


use Nemundo\Core\Type\Text\Text;
use Nemundo\Web\Parameter\UrlParameterList;
use Nemundo\Web\Parameter\UrlParameter;
use Nemundo\Web\Url\UrlBuilder;
use Nemundo\Web\WebConfig;


class UrlSite extends AbstractSite
{


    public function __construct(AbstractSiteTree $site = null)
    {

    }


    protected function loadSite()
    {

    }


    public function loadContent()
    {

    }


    public function getUrl()
    {
        return $this->url;
    }

}