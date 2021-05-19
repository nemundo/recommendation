<?php


namespace Nemundo\Content\Index\Geo\Setup;


use Nemundo\Content\Index\Geo\Data\GeoContentType\GeoContentType;
use Nemundo\Content\Index\Geo\Data\GeoContentType\GeoContentTypeDelete;
use Nemundo\Content\Setup\AbstractContentTypeSetup;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractType;

class GeoContentTypeSetup extends AbstractContentTypeSetup
{

    public function addContentType(AbstractType $contentType)
    {

        $data=new GeoContentType();
        $data->ignoreIfExists=true;
        $data->contentTypeId=$contentType->typeId;
        $data->save();

        return parent::addContentType($contentType);

    }


    public function removeContentType(AbstractContentType $contentType)
    {

        $delete=new GeoContentTypeDelete();
        $delete->filter->andEqual($delete->model->contentTypeId,$contentType->typeId);
        $delete->delete();

        return parent::removeContentType($contentType);

    }


}