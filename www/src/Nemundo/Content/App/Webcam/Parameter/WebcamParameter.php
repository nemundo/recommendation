<?php

namespace Nemundo\Content\App\Webcam\Parameter;

use Nemundo\Content\App\Webcam\Content\Webcam\WebcamContentType;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class WebcamParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'webcam';
    }

    public function getWebcamContentType() {
        return (new WebcamContentType($this->getValue()));
    }


}