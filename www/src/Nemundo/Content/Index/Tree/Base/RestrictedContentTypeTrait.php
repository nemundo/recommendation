<?php

namespace Nemundo\Content\Index\Tree\Base;


use Nemundo\Content\Index\Tree\Data\RestrictedContentType\RestrictedContentTypeReader;

trait RestrictedContentTypeTrait
{

    public $contentTypeId;


    protected function getRestrictedContentTypeData()
    {

        $reader = new RestrictedContentTypeReader();
        $reader->model->loadRestrictedContentType();
        $reader->filter->andEqual($reader->model->contentTypeId, $this->contentTypeId);
        $reader->addOrder($reader->model->restrictedContentType->contentType);

        return $reader->getData();

    }







}