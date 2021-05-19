<?php


namespace Nemundo\App\Apache\Install;


use Nemundo\App\Apache\Application\ApacheApplication;
use Nemundo\App\Apache\Script\HtaccessScript;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class ApacheInstall extends AbstractInstall
{

    public function install()
    {

        (new ScriptSetup(new ApacheApplication()))
            ->addScript(new HtaccessScript());

    }

}