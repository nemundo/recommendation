<?php


namespace Nemundo\Content\Collection;


use Nemundo\Content\Data\ApplicationContentType\ApplicationContentTypeReader;
use Nemundo\Content\Type\AbstractContentType;

class ApplicationContentTypeCollection extends AbstractContentTypeCollection
{

    protected function loadCollection()
    {

        $reader=new ApplicationContentTypeReader();
        $reader->model->loadContentType();
        foreach ($reader->getData() as $contentTypeRow) {
            //$this->addContentType($contentTypeRow)
        }

    }


    public function addContentType(AbstractContentType $contentType)
    {
        return parent::addContentType($contentType);
    }

}