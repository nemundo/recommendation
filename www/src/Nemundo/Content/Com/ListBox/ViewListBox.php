<?php


namespace Nemundo\Content\Com\ListBox;


use Nemundo\Content\Data\ContentView\ContentViewReader;
use Nemundo\Content\Parameter\ViewParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;


class ViewListBox extends BootstrapListBox
{

    private $contentTypeId;


    protected function loadContainer()
    {

        $this->label = 'View';
        $this->name = (new ViewParameter())->getParameterName();

        $this->emptyValueAsDefault = false;

    }


    public function getContent()
    {

        $reader = new ContentViewReader();
        $reader->filter->andEqual($reader->model->contentTypeId, $this->contentTypeId);
        $reader->addOrder($reader->model->viewName);
        foreach ($reader->getData() as $viewRow) {
            $this->addItem($viewRow->id, $viewRow->viewName);
        }

        return parent::getContent();

    }


    public function fromContentTypeId($contentTypeId)
    {

        $this->contentTypeId = $contentTypeId;
        return $this;
    }


    public function fromContent(AbstractContentType $contentType)
    {

        $this->contentTypeId = $contentType->typeId;
        return $this;

    }

}