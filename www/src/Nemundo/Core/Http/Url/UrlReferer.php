<?php

namespace Nemundo\Core\Http\Url;


use Nemundo\Core\Base\AbstractBaseClass;


class UrlReferer extends AbstractBaseClass
{

    /**
     * @var string
     */
    private $url;

    public function __construct()
    {

        if (isset($_SERVER['HTTP_REFERER'])) {
            $this->url = $_SERVER['HTTP_REFERER'];
        }

    }


    public function getUrl()
    {

        return $this->url;

    }

/*
    public function removeParameter(AbstractUrlParameter $parameter) {

    }*/

    public function removeAllParameter()
    {

        $this->url = strtok($this->url, '?');
        return $this;

    }


    public function redirect()
    {

        (new UrlRedirect())->redirect($this->getUrl());

    }

}