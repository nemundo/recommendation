<?php

namespace Nemundo\Com\FormBuilder\UrlReferer;


use Nemundo\Web\Site\AbstractSiteTree;
use Nemundo\Web\Site\UrlSite;

class UrlRefererSite extends UrlSite
{

    public function __construct(AbstractSiteTree $site = null)
    {
        $this->url = (new UrlRefererRequest())->getValue();
    }

}