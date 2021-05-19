<?php


namespace Nemundo\Content\App\Explorer\Collection;


use Nemundo\Content\App\Bookmark\Content\UrlContentType;
use Nemundo\Content\App\Explorer\Content\Container\ContainerContentType;
use Nemundo\Content\App\Explorer\Data\ExplorerContentType\ExplorerContentTypeReader;
use Nemundo\Content\App\File\Content\Upload\UploadContentType;
use Nemundo\Content\App\Note\Content\Note\NoteContentType;
use Nemundo\Content\Collection\AbstractContentTypeCollection;
use Nemundo\Content\Index\Tree\Base\RestrictedContentTypeTrait;
use Nemundo\Core\Debug\Debug;

class BaseContentTypeCollection extends AbstractContentTypeCollection
{

    use RestrictedContentTypeTrait;

    protected function loadCollection()
    {

        $this->collection = 'Base';


        $this->contentTypeId= (new ContainerContentType())->typeId;

        foreach ($this->getRestrictedContentTypeData() as $restrictedContentTypeRow) {

        }


        /*
        $reader = new ExplorerContentTypeReader();
        $reader->model->loadContentType();
        $reader->addOrder($reader->model->contentType->contentType);
        foreach ($reader->getData() as $explorerContentTypeRow) {

            $contentType  = $explorerContentTypeRow->contentType->getContentType();

            if ($contentType!==null) {
            $this->addContentType($explorerContentTypeRow->contentType->getContentType());
            }

        }*/

    }

}