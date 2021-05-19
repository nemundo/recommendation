<?php


namespace Hackathon\Setup;


use Hackathon\Data\NewsType\NewsType;
use Nemundo\Content\Setup\AbstractContentTypeSetup;
use Nemundo\Content\Type\AbstractType;

class NewsContentTypeSetup extends AbstractContentTypeSetup
{

    public function addContentType(AbstractType $contentType)
    {

        parent::addContentType($contentType);

        $data=new NewsType();
        $data->ignoreIfExists=true;
        $data->contentTypeId=$contentType->typeId;
        $data->save();

        return $this;

    }

}