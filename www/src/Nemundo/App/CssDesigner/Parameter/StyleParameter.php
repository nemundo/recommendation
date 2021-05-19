<?php

namespace Nemundo\App\CssDesigner\Parameter;

use Nemundo\App\CssDesigner\Data\Style\StyleReader;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class StyleParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'style';
    }


    public function getStyleRow()
    {
        $styleRow = (new StyleReader())->getRowById($this->getValue());
        return $styleRow;
    }

}