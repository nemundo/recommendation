<?php

namespace Nemundo\Core\Url;


class UrlUtility
{

    public static function appendUrlSeparatorIfNotExists($url)
    {
        $url = rtrim($url, '/') . '/';
        return $url;
    }


}