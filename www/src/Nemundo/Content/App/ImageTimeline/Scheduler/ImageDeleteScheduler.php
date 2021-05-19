<?php

namespace Nemundo\Content\App\ImageTimeline\Scheduler;

use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Content\App\ImageTimeline\Content\Image\ImageContentType;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;
use Nemundo\Core\Type\DateTime\DateTime;

class ImageDeleteScheduler extends AbstractScheduler
{

    protected function loadScheduler()
    {

        //$this->active = true;
        $this->overrideSetting = false;
        $this->day = 1;

        $this->consoleScript = true;
        $this->scriptName = 'timeline-image-delete';

    }

    public function run()
    {

        $dateTime = (new DateTime())->setNow()->minusDay(2);

        $imageReader = new ImageReader();
        $imageReader->filter->andEqualOrSmaller($imageReader->model->dateTime, $dateTime->getIsoDateTime());
        foreach ($imageReader->getData() as $imageRow) {

            //(new Debug())->write($imageRow->dateTime->getIsoDateTimeFormat());

            (new ImageContentType($imageRow->id))->deleteType();

        }


    }
}