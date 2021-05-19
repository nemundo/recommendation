<?php


namespace Nemundo\Content\Com\ListBox;


use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Content\Collection\AbstractContentTypeCollection;
use Nemundo\Content\Parameter\ContentTypeParameter;


class ContentTypeCollectionListBox extends BootstrapListBox
{

    /**
     * @var AbstractContentTypeCollection
     */
    public $contentTypeCollection;


    protected function loadContainer()
    {

        $this->label = 'Content Type';
        $this->name = (new ContentTypeParameter())->parameterName;

    }


    public function getContent()
    {

        foreach ($this->contentTypeCollection->getContentTypeList() as $contentType) {
            $this->addItem($contentType->typeId, $contentType->typeLabel);
        }

        return parent::getContent();

    }

}