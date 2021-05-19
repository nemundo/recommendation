<?php

namespace Nemundo\Content\App\ImageTimeline\Install;

use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\Content\App\ImageTimeline\Content\Image\ImageContentType;
use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\ImageTimelineContentType;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimelineModelCollection;
use Nemundo\Content\App\ImageTimeline\Scheduler\ImageTimelineScheduler;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class ImageTimelineUninstall extends AbstractUninstall
{
    public function uninstall()
    {

        (new ContentTypeSetup())
            ->removeContentType(new ImageTimelineContentType())
            ->removeContentType(new ImageContentType());

        (new SchedulerSetup())
            ->removeScheduler(new ImageTimelineScheduler());

        (new ModelCollectionSetup())
            ->removeCollection(new ImageTimelineModelCollection());


    }
}