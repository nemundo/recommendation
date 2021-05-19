<?php

namespace Nemundo\Content\App\Webcam\Install;

use Nemundo\Content\App\Webcam\Content\Webcam\WebcamContentType;
use Nemundo\Content\App\Webcam\Data\Webcam\WebcamReader;
use Nemundo\Content\App\Webcam\Data\WebcamModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractUninstall;


class WebcamUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        $reader = new WebcamReader();
        foreach ($reader->getData() as $webcamRow) {
            (new WebcamContentType($webcamRow->id))->deleteType();
        }

        (new ModelCollectionSetup())->removeCollection(new WebcamModelCollection());

    }
}