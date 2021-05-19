<?php

namespace Nemundo\App\SystemLog\Type;


class WarningLogType extends AbstractLogType
{

    protected function loadLogType()
    {
        $this->logType = 'Warning';
        $this->id = '44f58c13-4d6d-407a-9117-773e0acd6475';
    }

}