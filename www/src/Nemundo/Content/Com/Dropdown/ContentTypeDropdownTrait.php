<?php


namespace Nemundo\Content\Com\Dropdown;


use Nemundo\Content\Collection\AbstractContentTypeCollection;
use Nemundo\Content\Type\AbstractContentType;

trait ContentTypeDropdownTrait
{


    /**
     * @var AbstractContentType[]
     */
    protected $contentTypeList = [];

    /**
     * @var AbstractContentTypeCollection[]
     */
    protected $contentTypeCollectionList = [];




    public function addContentType(AbstractContentType $contentType)
    {

        $this->contentTypeList[] = $contentType;
        return $this;

    }


    public function addContentTypeCollection(AbstractContentTypeCollection $contentTypeCollection)
    {

        $this->contentTypeCollectionList[] = $contentTypeCollection;

        foreach ($contentTypeCollection->getContentTypeList() as $contentType) {
            $this->addContentType($contentType);
        }

        return $this;

    }



}