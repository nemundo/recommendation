<?php

namespace Nemundo\Content\App\Webcam\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\Content\App\Webcam\Application\WebcamApplication;
use Nemundo\Content\App\Webcam\Content\Webcam\WebcamContentType;
use Nemundo\Content\App\Webcam\Data\WebcamModelCollection;
use Nemundo\Content\App\Webcam\Scheduler\WebcamImageCrawlerScheduler;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;


class WebcamInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new WebcamApplication());

        (new ModelCollectionSetup())
            ->addCollection(new WebcamModelCollection());

        /*(new SchedulerSetup(new WebcamApplication()))
            ->addScheduler(new WebcamImageCrawlerScheduler());*/

        (new ContentTypeSetup(new WebcamApplication()))
            ->addContentType(new WebcamContentType());


    }
}