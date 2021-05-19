<?php

namespace Nemundo\Com\Device;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Device\DeviceInformation;


class BrowserInformation extends DeviceInformation
{

   /* public function getAgent()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        return $userAgent;
    }


    // getBrowserLanguage
    public function getBrowserLanguage()
    {
        $language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        return $language;
    }*/


    public function isMobile()
    {
        $detect = new \Mobile_Detect();
        return $detect->isMobile();
    }

    public function isTablet()
    {
        $detect = new \Mobile_Detect();
        return $detect->isTablet();
    }


}