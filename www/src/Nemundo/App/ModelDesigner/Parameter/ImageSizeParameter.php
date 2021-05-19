<?php

namespace Nemundo\App\ModelDesigner\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class ImageSizeParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'image-size';
    }

}