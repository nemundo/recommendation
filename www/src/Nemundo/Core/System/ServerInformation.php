<?php


namespace Nemundo\Core\System;


use Nemundo\Core\Base\AbstractBase;

class ServerInformation extends AbstractBase
{

    public function getIP() {

        return $_SERVER['SERVER_ADDR'];

    }

}