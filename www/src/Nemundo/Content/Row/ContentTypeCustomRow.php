<?php


namespace Nemundo\Content\Row;

use Nemundo\Content\Data\ContentType\ContentTypeRow;
use Nemundo\Content\Index\Tree\Type\TreeIndexTrait;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Log\LogMessage;


class ContentTypeCustomRow extends ContentTypeRow
{

    public function getContentType($dataId = null)
    {

        $className = $this->phpClass;

        $contentType = null;
        if (class_exists($className)) {

            /** @var AbstractContentType|TreeIndexTrait $contentType */
            $contentType = new $className($dataId);

        } else {
            (new LogMessage())->writeError('Content Type is not registred. Class: ' . $className);
        }

        return $contentType;


    }

}