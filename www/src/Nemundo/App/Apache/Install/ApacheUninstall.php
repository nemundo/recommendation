<?php


namespace Nemundo\App\Apache\Install;


use Nemundo\App\Apache\Application\ApacheApplication;
use Nemundo\App\Apache\Script\HtaccessScript;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\App\Script\Setup\ScriptSetup;

class ApacheUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        (new ScriptSetup(new ApacheApplication()))
            ->removeScript(new HtaccessScript());

    }

}