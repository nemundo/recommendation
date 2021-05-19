<?php


namespace Nemundo\Content\Parameter;


use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class SequenceContentTypeParameter extends ContentTypeParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'sequence-content-type';
    }



}