<?php

namespace Nemundo\Web\Action;


use Nemundo\Core\Http\Request\Get\GetRequest;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Web\Parameter\UrlParameter;


// AbstractActionPanel
// AbstractActionContainer
abstract class AbstractActionPanel extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    protected $actionParameterName = 'action';

    /**
     * @var ActionSite[]
     */
    protected $actionSiteList = [];

    // loadActionPanel
    abstract protected function loadActionSite();


    public function addActionSite(ActionSite $actionSite)
    {
        $this->actionSiteList[] = $actionSite;
        return $this;
    }


    protected function checkActionSite()
    {

        $parameter = new GetRequest($this->actionParameterName);
        $parameter->defaultValue = 'index';

        foreach ($this->actionSiteList as $actionUrl) {

            if ($actionUrl->actionName == $parameter->getValue()) {
                $function = $actionUrl->onAction;
                $function();
            }

        }

    }


    public function getContent()
    {

        $this->loadActionSite();


        foreach ($this->actionSiteList as $site) {
            $parameter = new UrlParameter();
            $parameter->parameterName = $this->actionParameterName;
            $parameter->setValue($site->actionName);
            $site->addParameter($parameter);
        }

        $this->checkActionSite();

        return parent::getContent();

    }

}