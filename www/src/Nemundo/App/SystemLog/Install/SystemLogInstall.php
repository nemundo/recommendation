<?php

namespace Nemundo\App\SystemLog\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\SystemLog\Application\SystemLogApplication;
use Nemundo\App\SystemLog\Data\LogType\LogType;
use Nemundo\App\SystemLog\Data\SystemLogModelCollection;
use Nemundo\App\SystemLog\Script\SystemLogCleanScript;
use Nemundo\App\SystemLog\Script\MessageScript;
use Nemundo\App\SystemLog\Type\AbstractLogType;
use Nemundo\App\SystemLog\Type\ErrorLogType;
use Nemundo\App\SystemLog\Type\InformationLogType;
use Nemundo\App\SystemLog\Type\WarningLogType;
use Nemundo\Model\Setup\ModelCollectionSetup;

class SystemLogInstall extends AbstractInstall
{

    public function install()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new SystemLogModelCollection());

        $this->addLogType(new InformationLogType());
        $this->addLogType(new WarningLogType());
        $this->addLogType(new ErrorLogType());

        (new ScriptSetup(new SystemLogApplication()))
            ->addScript(new MessageScript())
            ->addScript(new SystemLogCleanScript());

    }


    private function addLogType(AbstractLogType $logType)
    {

        $data = new LogType();
        $data->updateOnDuplicate = true;
        $data->id = $logType->id;
        $data->logType = $logType->logType;
        $data->save();

    }


}