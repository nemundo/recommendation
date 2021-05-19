<?php


namespace Nemundo\Content\Row;

use Nemundo\Content\Data\Content\ContentRow;
use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;
use Nemundo\Content\Type\AbstractContentType;


class ContentCustomRow extends ContentRow
{

    public $itemOrder;

    public function getContentType()
    {

        /** @var AbstractContentType|GeoIndexTrait $contentType */
        $contentType = $this->contentType->getContentType($this->dataId);

        return $contentType;

    }

}