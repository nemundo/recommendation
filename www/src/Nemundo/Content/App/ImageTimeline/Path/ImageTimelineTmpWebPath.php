<?php


namespace Nemundo\Content\App\ImageTimeline\Path;


use Nemundo\Project\Path\WebTmpPath;

class ImageTimelineTmpWebPath extends WebTmpPath
{

    protected function loadPath()
    {
        parent::loadPath(); // TODO: Change the autogenerated stub
        $this->addPath('image_timeline');
    }

}