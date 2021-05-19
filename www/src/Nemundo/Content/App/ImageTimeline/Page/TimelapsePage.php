<?php

namespace Nemundo\Content\App\ImageTimeline\Page;

use Nemundo\Content\App\ImageTimeline\Content\TimelapseJob\TimelapseJobContentType;
use Nemundo\Content\App\ImageTimeline\Template\ImageTimelineTemplate;

class TimelapsePage extends ImageTimelineTemplate
{
    public function getContent()
    {

        (new TimelapseJobContentType())->getDefaultForm($this);


        (new TimelapseJobContentType())->getListing($this);



        return parent::getContent();
    }
}