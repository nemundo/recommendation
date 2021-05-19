<?php


namespace Nemundo\Content\Collection;


use Nemundo\Content\Data\ContentTypeCollectionContentType\ContentTypeCollectionContentTypeReader;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBaseClass;

abstract class AbstractContentTypeCollection extends AbstractBaseClass
{

    public $collection;

    public $collectionId;


    abstract protected function loadCollection();

    /**
     * @var AbstractContentType[]
     */
    private $contentTypeList = [];

    public function __construct()
    {
        $this->loadCollection();
    }


    protected function loadData()
    {


        $reader = new ContentTypeCollectionContentTypeReader();
        $reader->model->loadContentType();
        $reader->filter->andEqual($reader->model->collectionId, $this->collectionId);
        foreach ($reader->getData() as $contentTypeRow) {
            $this->addContentType($contentTypeRow->contentType->getContentType());
        }

    }


    protected function addContentType(AbstractContentType $contentType)
    {

        // unique object

        $this->contentTypeList[] = $contentType;
        return $this;
    }


    protected function addContentTypeCollection(AbstractContentTypeCollection $contentTypeCollection)
    {

        foreach ($contentTypeCollection->getContentTypeList() as $contentType) {
            $this->addContentType($contentType);
        }

    }


    public function getContentTypeList()
    {
        return $this->contentTypeList;
    }

}