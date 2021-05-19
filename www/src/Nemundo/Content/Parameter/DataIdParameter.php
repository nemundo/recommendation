<?php


namespace Nemundo\Content\Parameter;


use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Web\Parameter\AbstractUrlParameter;

// DataParameter
class DataIdParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName='data-id';
    }



}