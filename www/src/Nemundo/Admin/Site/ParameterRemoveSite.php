<?php


namespace Nemundo\Admin\Site;


use Nemundo\Admin\Parameter\RemoveParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\IconSite\AbstractClearSite;
use Nemundo\Web\Parameter\UrlParameter;
use Nemundo\Web\Url\UrlBuilder;


class ParameterRemoveSite extends AbstractClearSite
{

    /**
     * @var ParameterRemoveSite
     */
    public static $site;


    protected function loadSite()
    {

        parent::loadSite();

        $this->title = 'Remove Search Filter';
        $this->url = 'remove-parameter';

        ParameterRemoveSite::$site = $this;

    }


    public function loadContent()
    {

        $parameter = new UrlParameter();
        $parameter->parameterName = (new RemoveParameter())->getValue();

        $url = new UrlBuilder((new UrlReferer())->getUrl());
        $url->addParameter($parameter);
        $url->redirect();

    }

}