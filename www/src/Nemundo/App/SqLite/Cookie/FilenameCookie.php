<?php


namespace Nemundo\App\SqLite\Cookie;


use Nemundo\Core\Http\Cookie\AbstractCookie;

class FilenameCookie extends AbstractCookie
{

    protected function loadCookie()
    {
        $this->cookieName='sqlite_filename';
    }

}