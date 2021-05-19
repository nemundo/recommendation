<?php

namespace Nemundo\Web\Site;


class ExternalSite extends AbstractSite
{

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

    public function getUrlWithDomain()
    {
        return $this->getUrl();
    }


}