<?php


namespace Nemundo\Content\Parameter;


use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class ContentParameter extends AbstractContentUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'content';
    }

}