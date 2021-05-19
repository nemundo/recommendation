<?php

namespace Nemundo\Core\Http\Url;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogConfig;


class UrlRedirect extends AbstractBaseClass
{

    public function redirect($url)
    {

        if (!LogConfig::$errorMessageOccurs) {
            header('Location: ' . $url);
        }

        exit;

    }

}