<?php

namespace Nemundo\Web\Action;

use Nemundo\Web\Url\UrlBuilder;
use Nemundo\Core\Http\Url\UrlRedirect;


class ActionUrlBuilder extends UrlBuilder
{

    /**
     * @var string
     */
    public $actionName = 'index';

    /**
     * @var \Closure
     */
    public $onAction;

    //private $url;

    //private $parameter;


    function __construct(AbstractActionPanel $panel)
    {

        $panel->addActionUrl($this);

        $this->url = $_SERVER['REQUEST_URI'];

        // temporäres GET Array
        $this->parameter = $_GET;

    }


    public function getUrl()
    {


        $this->parameter['action'] = $this->actionName;

        $url = strtok($this->url, '?');

        if (sizeof($this->parameter) > 0) {
            $query_string = http_build_query($this->parameter);
            $url = $url . '?' . $query_string;
        }

        return $url;

    }


    public function redirect()
    {

        (new UrlRedirect())->redirect($this->getUrl());

    }


    public function removeAction()
    {
        if (isset($this->parameter['action'])) {
            unset($this->parameter['action']);
        }
    }

    public function getParameter($parameter)
    {
        $value = '';
        if (isset($this->parameter[$parameter])) {
            $value = $this->parameter[$parameter];
        }

        return $value;
    }


    public function checkAction()
    {

        if ($this->actionName == $this->getAction()) {
            $function = $this->onAction;
            $function();
        }


    }


    private function getAction()
    {

        $action = (new ActionUrlParameter())->getValue();
        return $action;

    }

}