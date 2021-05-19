<?php

namespace Nemundo\Core\Http\Domain;


use Nemundo\Core\Base\AbstractBaseClass;

class DomainInformation extends AbstractBaseClass
{

    public function getHost()
    {

        $host = '';
        if (isset($_SERVER['SERVER_NAME'])) {
            $host = $_SERVER['SERVER_NAME'];
        }

        return $host;

    }


    public function getDomain()
    {

        $domain = 'http';
        if (isset($_SERVER['HTTPS'])) {
            $domain = 'https';
        }
        $domain .= '://';

        if (isset($_SERVER['HTTP_HOST'])) {
            $domain .= $_SERVER['HTTP_HOST'];
        }

        return $domain;

    }


    public function getPort()
    {

        $port = 0;
        if (isset($_SERVER['SERVER_PORT'])) {
            $port = $_SERVER['SERVER_PORT'];
        }

        return $port;

    }

}