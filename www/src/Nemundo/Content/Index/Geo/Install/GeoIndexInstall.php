<?php


namespace Nemundo\Content\Index\Geo\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Index\Geo\Action\KmlContentAction;
use Nemundo\Content\Index\Geo\Application\GeoIndexApplication;
use Nemundo\Content\Index\Geo\Data\GeoModelCollection;
use Nemundo\Content\Index\Geo\Scheduler\GeoDistanceScheduler;
use Nemundo\Content\Index\Geo\Script\GeoIndexCleanScript;
use Nemundo\Content\Index\Geo\Type\GeoIndexType;
use Nemundo\Content\Setup\ContentActionSetup;
use Nemundo\Content\Setup\IndexTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class GeoIndexInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new GeoIndexApplication());

        (new GeoIndexApplication())->setAppMenuActive();

        (new ModelCollectionSetup())
            ->addCollection(new GeoModelCollection());

        (new ScriptSetup(new GeoIndexApplication()))
            ->addScript(new GeoIndexCleanScript());

        (new SchedulerSetup(new GeoIndexApplication()))
            ->addScheduler(new GeoDistanceScheduler());

        (new ContentActionSetup())
            ->addContentAction(new KmlContentAction());

        (new IndexTypeSetup())->addIndexType(new GeoIndexType());


    }

}