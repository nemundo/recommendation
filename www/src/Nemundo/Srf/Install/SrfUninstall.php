<?php


namespace Nemundo\Srf\Install;


use Nemundo\App\Content\Setup\ContentTypeSetup;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Srf\Content\Livestream\SrfLivestreamContentType;
use Nemundo\Srf\Data\SrfCollection;
use Nemundo\Srf\Scheduler\SrfImportScheduler;
use Nemundo\Srf\Script\SrfCleanScript;
use Nemundo\Srf\Script\SrfTestScript;


// AbstractUninstall
// AbstractIntall



class SrfUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new SrfCollection());

        $setup = new ScriptSetup();
        //$setup->removeScript(new SrfImportScript());
        $setup->removeScript(new SrfCleanScript());

        $setup = new SchedulerSetup();
        $setup->removeScheduler(new SrfImportScheduler());


        $setup=new \Nemundo\Process\Content\Setup\ContentTypeSetup();
        $setup->removeContentType(new SrfLivestreamContentType());



        // remove search


    }

}