<?php


namespace Nemundo\Content\App\Calendar\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Calendar\Application\CalendarApplication;
use Nemundo\Content\App\Calendar\Content\Calendar\CalendarContentType;
use Nemundo\Content\App\Calendar\Data\CalendarModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Application\Type\Install\AbstractUninstall;


class CalendarUninstall extends AbstractUninstall
{

    public function uninstall()
    {


        (new ContentTypeSetup(new CalendarApplication()))
            ->removeContentType(new CalendarContentType());

        (new ModelCollectionSetup())
            ->removeCollection(new CalendarModelCollection());


    }

}