<?php

namespace Nemundo\Content\App\ImageTimeline\Scheduler;

use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Content\App\ImageTimeline\Content\Image\ImageContentImport;
use Nemundo\Content\App\ImageTimeline\Data\ImageTimeline\ImageTimelineReader;

class ImageTimelineScheduler extends AbstractScheduler
{
    protected function loadScheduler()
    {

        //$this->active = true;
        $this->overrideSetting = false;
        $this->minute = 5;


        $this->consoleScript = true;
        $this->scriptName = 'timeline-image';

    }

    public function run()
    {

        $reader = new ImageTimelineReader();
        $reader->filter->andEqual($reader->model->crawling, true);
        foreach ($reader->getData() as $timelineRow) {

            $import = new ImageContentImport();
            $import->timelineId = $timelineRow->id;
            $import->imageUrl = $timelineRow->imageUrl;
            $import->importContent();

        }


    }
}