<?php


namespace Nemundo\Content\Index\Geo\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Index\Geo\Application\GeoIndexApplication;
use Nemundo\Content\Index\Geo\Data\GeoModelCollection;
use Nemundo\Content\Index\Geo\Scheduler\GeoDistanceScheduler;
use Nemundo\Content\Index\Geo\Script\GeoIndexCleanScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class GeoIndexUninstall extends AbstractUninstall
{

    public function uninstall()
    {
        

        (new ModelCollectionSetup())
            ->removeCollection(new GeoModelCollection());

        (new ScriptSetup(new GeoIndexApplication()))
            ->removeScript(new GeoIndexCleanScript());

        (new SchedulerSetup())
            ->removeScheduler(new GeoDistanceScheduler());


    }

}