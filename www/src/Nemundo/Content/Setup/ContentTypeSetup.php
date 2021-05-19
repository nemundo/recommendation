<?php


namespace Nemundo\Content\Setup;


use Nemundo\Content\Collection\AbstractContentTypeCollection;
use Nemundo\Content\Data\ContentType\ContentTypeDelete;
use Nemundo\Content\Data\ContentType\ContentTypeUpdate;
use Nemundo\Content\Type\AbstractType;

class ContentTypeSetup extends AbstractContentTypeSetup
{

    public function addContentType(AbstractType $contentType)
    {
        parent::addContentType($contentType);
        return $this;
    }


    public function addContentTypeCollection(AbstractContentTypeCollection $collection)
    {

        foreach ($collection->getContentTypeList() as $contentType) {
            $this->addContentType($contentType);
        }

        return $this;

    }


    public function removeContentTypeCollection(AbstractContentTypeCollection $collection)
    {

        foreach ($collection->getContentTypeList() as $contentType) {
            $this->removeContentType($contentType);
        }

        return $this;

    }




/*
    public function resetSetupStatus()
    {

        $update = new ContentTypeUpdate();
        $update->setupStatus = false;
        $update->update();

    }


    public function removeUnusedSetupStatus()
    {

        $delete = new ContentTypeDelete();
        $delete->filter->andEqual($delete->model->setupStatus, false);
        $delete->delete();

    }*/

}