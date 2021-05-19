<?php

namespace Nemundo\Com\Utility;


use Nemundo\Com\ComConfig;
use Nemundo\Core\Base\AbstractBase;

class UniqueComName extends AbstractBase
{

    public function getUniqueName() {

        $autoId = 'auto_com_' . ComConfig::$comCount;
        ComConfig::$comCount++;

        return $autoId;

    }

}