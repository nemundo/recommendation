<?php


namespace Nemundo\Content\Parameter;


use Nemundo\Content\Builder\ContentBuilder;
use Nemundo\Content\Check\ContentTypeCheckTrait;
use Nemundo\Content\Index\Geo\Com\Container\GeoIndexContainer;
use Nemundo\Web\Parameter\AbstractUrlParameter;

abstract class AbstractContentUrlParameter extends AbstractUrlParameter
{

    use ContentTypeCheckTrait;


    public function getContent($checkContentType = false)
    {

        $contentType = (new ContentBuilder())->getContent($this->getValue());

        if ($checkContentType) {
            $this->checkContentType($contentType);
        }

        return $contentType;

    }

}