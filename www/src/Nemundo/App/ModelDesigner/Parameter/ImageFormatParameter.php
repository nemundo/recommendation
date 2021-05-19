<?php

namespace Nemundo\App\ModelDesigner\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class ImageFormatParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'image-format';
    }

}