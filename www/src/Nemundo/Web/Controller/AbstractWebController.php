<?php

namespace Nemundo\Web\Controller;


use Nemundo\Html\Document\HtmlDocument;
use Nemundo\Core\Http\Response\StatusCode;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\AbstractSiteTree;
use Nemundo\Web\Site\AbstractWildcardSite;
use Nemundo\Web\Url\UrlBuilder;
use Nemundo\Web\WebConfig;

abstract class AbstractWebController extends AbstractSiteTree
{

    /**
     * @var AbstractWebController
     */
    public static $controller;

    /**
     * @var AbstractSite
     */
    public static $currentSite;

    /**
     * @var string[]
     */
    private $urlList;

    /**
     * @var int
     */
    private $urlListCount;

    /**
     * @var bool
     */
    private $foundSite = false;

    /**
     * @var bool
     */
    private $accessForbidden = false;


    abstract protected function loadController();

    public function __construct()
    {
        $this->loadController();
        AbstractWebController::$controller = $this;
    }


    public function render()
    {

        $url = new UrlBuilder();
        $this->urlList = $url->getUrlList();

        $this->urlListCount = sizeof($this->urlList);
        $this->checkUrl($this, 1);

        if (!$this->foundSite) {

            $className = WebConfig::$notFound404Page;

            /** @var HtmlDocument $page */
            $page = new $className();
            $page->statusCode = StatusCode::NOT_FOUND;
            $page->render();

        }


        if ($this->accessForbidden && $this->foundSite) {

            $className = WebConfig::$forbidden403Page;

            /** @var HtmlDocument $page */
            $page = new $className();
            $page->statusCode = StatusCode::FORBIDDEN;
            $page->render();

        }

    }


    private function checkUrl(AbstractSiteTree $site, $urlLevel)
    {

        /** @var AbstractSite|AbstractWildcardSite $siteChild */
        foreach ($site->getSiteList() as $siteChild) {

            if ($siteChild->isObjectOfClass(AbstractWildcardSite::class)) {

                // user check

                $siteChild->wildcardUrl = $this->urlList[$urlLevel - 1];
                $this->foundSite = $siteChild->checkWildcardUrl();

                if ($this->foundSite) {
                    $siteChild->loadContent();
                }

            }

            if (!$this->foundSite) {

                if ($this->urlList[$urlLevel - 1] == $siteChild->url) {

                    if (!$siteChild->checkUserVisibility()) {
                        $this->accessForbidden = true;
                    }

                    if ($this->urlListCount == $urlLevel) {

                        $this->foundSite = true;
                        if (!$this->accessForbidden) {

                            AbstractWebController::$currentSite = $siteChild;
                            $siteChild->loadContent();

                        }

                    } else {
                        $this->checkUrl($siteChild, $urlLevel + 1);
                    }

                }

            }

        }

    }

}