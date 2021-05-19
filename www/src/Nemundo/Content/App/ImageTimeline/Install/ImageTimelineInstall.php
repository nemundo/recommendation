<?php

namespace Nemundo\Content\App\ImageTimeline\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\App\ImageTimeline\Application\ImageTimelineApplication;
use Nemundo\Content\App\ImageTimeline\Content\Image\ImageContentType;
use Nemundo\Content\App\ImageTimeline\Content\ImageCarousel\ImageCarouselContentType;
use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\ImageTimelineContentType;
use Nemundo\Content\App\ImageTimeline\Content\TimelapseJob\TimelapseJobContentType;
use Nemundo\Content\App\ImageTimeline\Content\TimelapseVideo\TimelapseVideoContentType;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimelineModelCollection;
use Nemundo\Content\App\ImageTimeline\Scheduler\ImageDeleteScheduler;
use Nemundo\Content\App\ImageTimeline\Scheduler\ImageTimelineScheduler;
use Nemundo\Content\App\ImageTimeline\Script\DeleteImageScript;
use Nemundo\Content\App\Job\Setup\JobSetup;
use Nemundo\Content\App\Timeline\Application\TimelineApplication;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class ImageTimelineInstall extends AbstractInstall
{

    public function install()
    {

        (new TimelineApplication())->installApp()->setAppMenuActive();

        (new ApplicationSetup())->addApplication(new ImageTimelineApplication());

        (new ModelCollectionSetup())->addCollection(new ImageTimelineModelCollection());

        (new ContentTypeSetup(new ImageTimelineApplication()))
            ->addContentType(new ImageCarouselContentType())
            ->addContentType(new TimelapseVideoContentType())
            ->addContentType(new ImageTimelineContentType())
            ->addContentType(new ImageContentType());

        (new SchedulerSetup(new ImageTimelineApplication()))
            ->addScheduler(new ImageTimelineScheduler())
            ->addScheduler(new ImageDeleteScheduler());

        (new ScriptSetup(new ImageTimelineApplication()))
            ->addScript(new DeleteImageScript());


        (new JobSetup(new ImageTimelineApplication()))
            ->addJob(new TimelapseJobContentType());

    }
}