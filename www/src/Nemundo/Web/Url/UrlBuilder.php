<?php

namespace Nemundo\Web\Url;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Http\Url\AbstractUrlBuilder;
use Nemundo\Core\Http\Url\UrlRedirect;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Web\Parameter\AbstractUrlParameter;
use Nemundo\Web\WebConfig;

class UrlBuilder extends AbstractUrlBuilder
{

    public function getParameterList()
    {

        return $this->requestList;

    }


    public function getParameter($parameter)
    {

        $value = '';
        if (isset($this->requestList[$parameter])) {
            $value = $this->requestList[$parameter];
        }

        return $value;

    }


    public function addParameter(AbstractUrlParameter $parameter)
    {
        $this->requestList[$parameter->getParameterName()] = $parameter->getValue();
        return $this;
    }


    public function removeParameter(AbstractUrlParameter $paramter)
    {
        unset($this->requestList[$paramter->getParameterName()]);
        return $this;
    }


    public function removeAllParameter()
    {
        $this->requestList = [];
        return $this;
    }




    // seperate !!!
    public function getUrlList($removePrefixUrl = '')
    {

        $requestUri = strtok($this->url, '?');

        $uri = new Text($requestUri);
        $uri->removeLeft(WebConfig::$webUrl . $removePrefixUrl);
        $uri->removeRight('/');

        $list = $uri->split('/');


        // Home Url
        if (sizeof($list) == 0) {
            $list[] = '';
        }

        return $list;

    }


    public function getUrlPart($number)
    {

        $list = $this->getUrlList();

        $part = '';
        if (isset($list[$number])) {
            $part = $list[$number];
        }
        return $part;

    }


    public function redirect()
    {

        (new UrlRedirect())->redirect($this->getUrl());

    }


    public function getUrlWithoutParameter()
    {

        $url = strtok($this->url, '?');
        return $url;

    }


    public function getHost()
    {
        $host = parse_url($this->url, PHP_URL_HOST);
        return $host;
    }


    public function getProtocol()
    {
        $protocol = parse_url($this->url, PHP_URL_SCHEME);
        return $protocol;
    }


    public function getFilenameExtension()
    {

        $path_info = pathinfo($this->url);
        $filenameExtension = '';
        if (isset($path_info['extension'])) {
            $filenameExtension = $path_info['extension'];
        }

        return $filenameExtension;

    }


    public function isSecure()
    {

    }


    public function getHeader()
    {
        return get_headers($this->url);
    }

    public function getResponseCode()
    {

        $responseCode = get_headers($this->url)[0];
        $responseCode = substr($responseCode, 9, 3);
        return $responseCode;

    }


    public function existsUrl()
    {

        $returnValue = false;
        if ($this->getResponseCode() == '200') {
            $returnValue = true;
        }
        return $returnValue;

    }


}