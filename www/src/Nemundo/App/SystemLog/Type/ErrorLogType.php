<?php

namespace Nemundo\App\SystemLog\Type;


class ErrorLogType extends AbstractLogType
{

    protected function loadLogType()
    {
        $this->logType = 'Error';
        $this->id = '74ea4d05-565f-48e5-addb-d9df39a3dbf6';
    }

}