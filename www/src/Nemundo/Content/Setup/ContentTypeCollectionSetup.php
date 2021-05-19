<?php

namespace Nemundo\Content\Setup;


use Nemundo\Content\Collection\AbstractContentTypeCollection;
use Nemundo\Content\Data\ContentTypeCollection\ContentTypeCollection;
use Nemundo\Core\Base\AbstractBase;

class ContentTypeCollectionSetup extends AbstractBase
{

    public function addContentTypeCollection(AbstractContentTypeCollection $contentTypeCollection)
    {

        $data = new ContentTypeCollection();
        $data->updateOnDuplicate = true;
        $data->id = $contentTypeCollection->collectionId;
        $data->collection = $contentTypeCollection->collection;
        $data->phpClass = $contentTypeCollection->getClassName();
        $data->save();

        return $this;

    }

}