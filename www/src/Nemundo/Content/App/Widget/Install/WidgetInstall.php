<?php


namespace Nemundo\Content\App\Widget\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Widget\Application\WidgetApplication;
use Nemundo\Content\App\Widget\Content\Clock\ClockContentType;
use Nemundo\Content\App\Widget\Content\UniqueId\UniqueIdContentType;
use Nemundo\Content\App\Widget\Content\UtcTime\UtcTimeContentType;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class WidgetInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
        ->addApplication(new WidgetApplication());

        (new ContentTypeSetup(new WidgetApplication()))
            ->addContentType(new ClockContentType())
            ->addContentType(new UtcTimeContentType())
            ->addContentType(new UniqueIdContentType());

        (new ClockContentType())->saveType();
        (new UtcTimeContentType())->saveType();
        (new UniqueIdContentType())->saveType();




    }

}