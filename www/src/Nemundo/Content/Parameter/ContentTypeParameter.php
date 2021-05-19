<?php


namespace Nemundo\Content\Parameter;


use Nemundo\Content\Builder\ContentTypeBuilder;
use Nemundo\Content\Check\ContentTypeCheckTrait;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class ContentTypeParameter extends AbstractUrlParameter
{

    use ContentTypeCheckTrait;


    protected function loadParameter()
    {
        $this->parameterName = 'content-type';
    }


    public function getContentType()
    {

        $contentType = (new ContentTypeBuilder())->getContentType($this->getValue());
        return $contentType;

    }

}