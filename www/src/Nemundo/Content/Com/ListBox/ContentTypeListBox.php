<?php


namespace Nemundo\Content\Com\ListBox;


use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class ContentTypeListBox extends BootstrapListBox
{

    public $applicationId;

    protected function loadContainer()
    {

        $this->label = 'Content Type';
        $this->name = (new ContentTypeParameter())->parameterName;

    }


    public function getContent()
    {

        $reader = new ContentTypeReader();

        if ($this->applicationId !== null) {
            $reader->filter->andEqual($reader->model->applicationId, $this->applicationId);
        }

        $reader->addOrder($reader->model->contentType);
        foreach ($reader->getData() as $contentTypeRow) {
            $this->addItem($contentTypeRow->id, $contentTypeRow->contentType);
        }

        return parent::getContent();

    }


    public function getContentType()
    {

        $contentType = (new ContentTypeParameter())->getContentType();
        return $contentType;

    }

}