<?php

namespace Nemundo\Core\Random;


use Nemundo\Core\Base\AbstractBase;


class UniqueId extends AbstractBase
{

    public function getUniqueId()
    {

        // http://rogerstringer.com/2013/11/15/generate-uuids-php/
        $uniqueId = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));

        return $uniqueId;

    }

}