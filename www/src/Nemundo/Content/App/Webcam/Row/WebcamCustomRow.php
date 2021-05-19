<?php

namespace Nemundo\Content\App\Webcam\Row;

// Nemundo\Content\App\Webcam\Row\WebcamCustomRow

use Nemundo\Content\App\Webcam\Content\Webcam\WebcamContentType;
use Nemundo\Content\App\Webcam\Data\Webcam\WebcamRow;

class WebcamCustomRow extends WebcamRow
{

    public function getWebcamContentType() {

        return (new WebcamContentType($this->id));

    }

}