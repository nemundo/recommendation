<?php

namespace Nemundo\Web\Site;


use Nemundo\Core\Http\Domain\DomainInformation;
use Nemundo\Core\Http\Url\UrlRedirect;
use Nemundo\User\Access\UserRestrictionTrait;
use Nemundo\Web\Parameter\AbstractUrlParameter;
use Nemundo\Web\Url\UrlBuilder;
use Nemundo\Web\WebConfig;


abstract class AbstractSite extends AbstractSiteTree
{

    use UserRestrictionTrait;

    /**
     * @var string|string[]
     */
    public $title;
    // siteTitle

    /**
     * @var string
     */
    public $url;

    /**
     * @var string
     */
    public $anchor;

    /**
     * @var bool
     */
    public $active = true;

    /**
     * @var bool
     */
    public $menuActive = true;

    /**
     * @var bool
     */
    public $showMenuAsActive = false;

    /**
     * @var AbstractUrlParameter[]
     */
    private $parameterList = [];

    /**
     * @var string
     */
    protected $parentUrl;

    abstract protected function loadSite();

    abstract public function loadContent();


    public function __construct(AbstractSiteTree $site = null)
    {

        if ($site !== null) {
            $site->addSite($this);
            $this->parentUrl = $site->getUrl();
        } else {
            $this->parentUrl = WebConfig::$webUrl;
        }

        $this->loadSite();

    }


    public function isMenuVisible()
    {

        $visible = false;

        if ($this->menuActive) {
            $visible = $this->checkUserVisibility();
        }

        return $visible;

    }


    public function isCurrentSite()
    {

        $returnValue = false;
        if ((new UrlBuilder())->getUrlWithoutParameter() == $this->getUrlWithoutParameter()) {
            $returnValue = true;
        }

        if ($this->showMenuAsActive) {
            $returnValue = true;
        }

        return $returnValue;

    }


    public function addParameter(AbstractUrlParameter $parameter)
    {

        $found = false;


        // Problem mit MultipleParameter
        if ($parameter->isObjectOfClass(AbstractUrlParameter::class)) {
            foreach ($this->parameterList as $key => $value) {

                if ($value->getParameterName() == $parameter->getParameterName()) {
                    $this->parameterList[$key] = $parameter;
                    $found = true;
                }

            }
        }

        if (!$found) {
            $this->parameterList[] = $parameter;
        }

        return $this;
    }


    public function removeParameter(AbstractUrlParameter $parameter)
    {

        foreach ($this->parameterList as $key => $value) {
            if ($parameter->getParameterName() == $value->getParameterName()) {
                unset($this->parameterList[$key]);
            }
        }

        return $this;

    }


    public function getUrl()
    {

        $url = $this->getUrlWithoutParameter();

        $urlParameter = [];
        foreach ($this->parameterList as $parameter) {

            $value = $parameter->getUrl();
            if ($value !== '') {
                $urlParameter[] = $value;
            }

        }

        if (sizeof($urlParameter) > 0) {
            $url .= '?' . implode('&', $urlParameter);
        }

        if ($this->anchor !== null) {
            $url .= '#' . $this->anchor;
        }

        return $url;

    }


    public function getUrlWithoutParameter()
    {

        $url = $this->parentUrl . '/' . $this->url;
        $url = str_replace('//', '/', $url);
        return $url;

    }


// getFullUrl
    public function getUrlWithDomain()
    {
        $domain = new DomainInformation();
        $url = $domain->getDomain() . $this->getUrl();
        return $url;
    }


    public function redirect()
    {

        (new UrlRedirect())->redirect($this->getUrl());

    }


    public function render()
    {
        $this->loadContent();
    }

}