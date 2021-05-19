<?php


namespace Nemundo\Content\App\Explorer\Setup;


use Nemundo\Content\App\Explorer\Data\ExplorerContentType\ExplorerContentType;
use Nemundo\Content\App\Explorer\Data\ExplorerContentType\ExplorerContentTypeCount;
use Nemundo\Content\Setup\AbstractContentTypeSetup;
use Nemundo\Content\Type\AbstractType;

class ExplorerSetup extends AbstractContentTypeSetup
{


    public function addContentType(AbstractType $contentType)
    {

        //parent::addContentType($contentType);

        /*$data = new ExplorerContentType();
        $data->ignoreIfExists=true;
        $data->contentTypeId=$contentType->typeId;
        $data->save();*/

        $this->addContentTypeId($contentType->typeId);

        return $this;

    }


    public function addContentTypeId($typeId)
    {


        $count = new ExplorerContentTypeCount();
        $count->filter->andEqual($count->model->contentTypeId, $typeId);
        if ($count->getCount() == 0) {
            $data = new ExplorerContentType();
            //$data->ignoreIfExists=true;
            $data->contentTypeId = $typeId;
            $data->save();
        }

        return $this;


    }


}