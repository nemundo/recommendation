<?php


namespace Nemundo\Content\Builder;


use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Core\Base\AbstractBase;

class ContentTypeBuilder extends AbstractBase
{

    public function getContentType($contentTypeId)
    {

        $contentType = (new ContentTypeReader())->getRowById($contentTypeId)->getContentType();
        return $contentType;

    }

}