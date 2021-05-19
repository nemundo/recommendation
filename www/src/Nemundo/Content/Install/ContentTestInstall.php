<?php


namespace Nemundo\Content\Install;


use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Script\ContentCleanScript;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class ContentTestInstall extends AbstractInstall
{

    public function install()
    {
        // TODO: Implement install() method.

        $setup=new ScriptSetup();
        $setup->addScript(new ContentCleanScript());

    }

}