<?php


namespace Nemundo\Content\Com\ListBox;


use Nemundo\Content\Data\ViewContentType\ViewContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class ViewContentTypeListBox extends BootstrapListBox
{

    public $applicationId;

    protected function loadContainer()
    {

        $this->label = 'Content Type (View)';
        $this->name = (new ContentTypeParameter())->parameterName;

    }


    public function getContent()
    {

        $reader = new ViewContentTypeReader();
        $reader->model->loadContentType();

        if ($this->applicationId !== null) {
            $reader->filter->andEqual($reader->model->contentType->applicationId, $this->applicationId);
        }

        $reader->addOrder($reader->model->contentType->contentType);
        foreach ($reader->getData() as $contentTypeRow) {
            $this->addItem($contentTypeRow->contentTypeId, $contentTypeRow->contentType->contentType);
        }

        return parent::getContent();
    }


    public function getContentType()
    {

        $contentType = (new ContentTypeParameter())->getContentType();
        return $contentType;

    }


}