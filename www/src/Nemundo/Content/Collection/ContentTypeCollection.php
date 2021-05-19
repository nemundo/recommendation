<?php


namespace Nemundo\Content\Collection;


use Nemundo\Content\Type\AbstractContentType;

class ContentTypeCollection extends AbstractContentTypeCollection
{

    protected function loadCollection()
    {

    }


    public function addContentType(AbstractContentType $contentType)
    {
        return parent::addContentType($contentType);
    }

}