<?php


namespace Nemundo\Content\App\ImageTimeline\Path;


use Nemundo\Project\Path\TmpPath;

class ImageTimelineTmpPath extends TmpPath
{

    protected function loadPath()
    {
        parent::loadPath();
        $this->addPath('image_timeline');
    }

}