<?php


namespace Nemundo\Content\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\Application\ContentApplication;
use Nemundo\Content\Index\Geo\Application\GeoIndexApplication;
use Nemundo\Content\Index\Log\Application\LogApplication;
use Nemundo\Content\Index\Relation\Application\RelationApplication;
use Nemundo\Content\Index\Search\Application\SearchApplication;
use Nemundo\Content\Index\Tree\Application\TreeApplication;

class ContentApplicationInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new TreeApplication())
            ->addApplication(new GeoIndexApplication())
            ->addApplication(new SearchApplication())
            ->addApplication(new LogApplication())
            ->addApplication(new RelationApplication())
            ->addApplication(new ContentApplication());

    }

}