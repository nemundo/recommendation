<?php

namespace Nemundo\Com\Utility;


use Nemundo\Com\ComConfig;

class ComUtility
{

    public static function getAutoId()
    {

        $autoId = 'auto_com_' . ComConfig::$comCount;
        ComConfig::$comCount++;

        return $autoId;

    }

}