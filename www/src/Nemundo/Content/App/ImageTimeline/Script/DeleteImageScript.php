<?php

namespace Nemundo\Content\App\ImageTimeline\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\App\ImageTimeline\Content\Image\ImageContentType;
use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;

class DeleteImageScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'imagetimeline-delete-image';
    }

    public function run()
    {


        $imageReader = new ImageReader();
        foreach ($imageReader->getData() as $imageRow) {
            (new ImageContentType($imageRow->id))->deleteType();
        }


    }
}