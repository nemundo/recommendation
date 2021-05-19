<?php


namespace Nemundo\Content\App\Calendar\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Calendar\Application\CalendarApplication;
use Nemundo\Content\App\Calendar\Content\Calendar\CalendarContentType;
use Nemundo\Content\App\Calendar\Content\CalendarWidget\CalendarWidgetContentType;
use Nemundo\Content\App\Calendar\Data\CalendarModelCollection;
use Nemundo\Content\App\Timeline\Application\TimelineApplication;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;


class CalendarInstall extends AbstractInstall
{

    public function install()
    {

        (new TimelineApplication())->installApp();

        (new ApplicationSetup())
            ->addApplication(new CalendarApplication());

        (new ModelCollectionSetup())
            ->addCollection(new CalendarModelCollection());

        (new ContentTypeSetup(new CalendarApplication()))
            ->addContentType(new CalendarContentType())
            ->addContentType(new CalendarWidgetContentType());


    }

}