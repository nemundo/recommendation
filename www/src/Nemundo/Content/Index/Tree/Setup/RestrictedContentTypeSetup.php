<?php

namespace Nemundo\Content\Index\Tree\Setup;


use Nemundo\Content\Collection\AbstractContentTypeCollection;
use Nemundo\Content\Index\Tree\Data\RestrictedContentType\RestrictedContentType;
use Nemundo\Content\Index\Tree\Data\RestrictedContentType\RestrictedContentTypeCount;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;

class RestrictedContentTypeSetup extends AbstractBase
{

    /**
     * @var AbstractContentType
     */
    private $contentType;

    public function __construct(AbstractContentType $contentType)
    {
        $this->contentType = $contentType;
    }


    public function addRestrictedContentType(AbstractContentType $restrictedContentType)
    {

        if (!$this->contentType->isInstalled()) {
            (new LogMessage())->writeError('Content Type is not installed: '.$this->contentType->getClassName());
        }

        if (!$restrictedContentType->isInstalled()) {
            (new LogMessage())->writeError('Content Type is not installed: '.$restrictedContentType->getClassName());
        }


        if ($this->contentType->isInstalled() && $restrictedContentType->isInstalled()) {

            $count=new RestrictedContentTypeCount();
            $count->filter->andEqual($count->model->contentTypeId, $this->contentType->typeId);
            $count->filter->andEqual($count->model->restrictedContentTypeId, $restrictedContentType->typeId);
            if ($count->getCount() == 0) {

                $data = new RestrictedContentType();
                $data->contentTypeId = $this->contentType->typeId;
                $data->restrictedContentTypeId = $restrictedContentType->typeId;
                $data->save();

            }

        }

        return $this;

    }


    public function addRestrictedContentTypeCollection(AbstractContentTypeCollection $restrictedContentTypeCollection)
    {

        foreach ($restrictedContentTypeCollection->getContentTypeList() as $contentType) {
            $this->addRestrictedContentType($contentType);
        }

        return $this;

    }


}