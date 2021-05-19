<?php

namespace Nemundo\App\SystemLog\Type;


class InformationLogType extends AbstractLogType
{

    protected function loadLogType()
    {
        $this->logType = 'Information';
        $this->id = 'af5cade1-992b-4887-a780-59e72d85c9c6';
    }

}