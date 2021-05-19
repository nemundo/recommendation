<?php

namespace Nemundo\Content\App\Timeline\Site;

use Nemundo\App\Application\Parameter\ProjectParameter;
use Nemundo\Content\App\Timeline\Page\ItemPage;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Core\Http\Url\UrlRedirect;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\IconSite\AbstractClearSite;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlBuilder;

class ClearSite extends AbstractClearSite
{

    /**
     * @var ClearSite
     */
    public static $site;

    protected function loadSite()
    {

        ClearSite::$site=$this;

    }

    public function loadContent()
    {

        $urlBuilder =  (new UrlBuilder((new UrlReferer())->getUrl()))->removeParameter(new ContentTypeParameter());

        (new UrlRedirect())->redirect($urlBuilder->getUrl());



    }
}