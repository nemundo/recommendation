<?php


namespace Nemundo\Content\Json;


use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\JsonContentTrait;
use Nemundo\Core\Base\AbstractBase;

class ContentTypeJson extends AbstractBase
{

    /**
     * @param AbstractContentType|JsonContentTrait $contentType
     */
    public function getJsonData(AbstractContentType $contentType)
    {

        $reader = new ContentReader();
        $reader->model->loadContentType();
        $reader->filter->andEqual($reader->model->contentTypeId, $contentType->typeId);
        $reader->addOrder($reader->model->subject);

        $json = $contentType->getJsonHeader();

        $dataList = [];
        foreach ($reader->getData() as $contentRow) {
            $content = $contentRow->getContentType();
            $dataList[] = $content->getData();
        }

        $json['data'] = $dataList;

        return $json;

    }

}