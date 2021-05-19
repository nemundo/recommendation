<?php


namespace Nemundo\App\Application\Site;


use Nemundo\App\Application\Parameter\ProjectParameter;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Url\UrlRedirect;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\IconSite\AbstractClearSite;
use Nemundo\Web\Url\UrlBuilder;

class ClearSite extends AbstractClearSite
{

    /**
     * @var ClearSite
     */
    public static $site;

    protected function loadSite()
    {

        ClearSite::$site = $this;

    }


    public function loadContent()
    {


        $urlBuilder =  (new UrlBuilder((new UrlReferer())->getUrl()))->removeParameter(new ProjectParameter());

        (new UrlRedirect())->redirect($urlBuilder->getUrl());


        //(new Debug())->write($urlBuilder->getUrl());


        //(new Url())->red


//        (new UrlReferer())->redirect();

    }

}