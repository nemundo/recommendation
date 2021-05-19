<?php

namespace Nemundo\Core\Http\Url;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Http\Request\Get\AbstractGetRequest;


class UrlBuilder extends AbstractUrlBuilder  // AbstractBaseClass
{


    public function addRequestValue($requestName, $value = '')
    {
        $this->requestList[$requestName] = $value;
        return $this;
    }


    public function addRequest(AbstractGetRequest $parameter)
    {
        $this->requestList[$parameter->getRequestName()] = $parameter->getValue();
        return $this;
    }


    public function removeParameter(AbstractGetRequest $paramter)
    {
        unset($this->requestList[$paramter->getRequestName()]);
        return $this;
    }


    public function removeAllParameter()
    {
        $this->requestList = [];
        return $this;
    }


    /*
    public function getUrl()
    {

        $url = strtok($this->url, '?');

        if (sizeof($this->requestList) > 0) {
            $queryString = http_build_query($this->requestList);
            $url = $url . '?' . $queryString;
        }

        return $url;

    }*/


    /*
    public function getUrlWithoutEncoding()
    {


        $url = strtok($this->url, '?');

        if (sizeof($this->requestList) > 0) {
            $queryString = '';
            foreach ($this->requestList as $key => $value) {
                $queryString = $queryString . $key . '=' . $value . '&';
            }

            $url = $url . '?' . $queryString;
        }

        return $url;


    }*/


}