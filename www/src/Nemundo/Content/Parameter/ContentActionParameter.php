<?php


namespace Nemundo\Content\Parameter;


use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class ContentActionParameter extends ContentTypeParameter  // AbstractContentTypeUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'content-action';
    }

}