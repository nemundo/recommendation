<?php


namespace Nemundo\Content\Index\Geo\Com\ListBox;


use Nemundo\Content\Index\Geo\Data\GeoContentType\GeoContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class GeoContentTypeListBox extends BootstrapListBox
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $this->name = (new ContentTypeParameter())->getParameterName();
        $this->label = 'Content Type';

    }


    public function getContent()
    {

        $reader = new GeoContentTypeReader();
        $reader->model->loadContentType();
        foreach ($reader->getData() as $geoContentTypeRow) {
            $this->addItem($geoContentTypeRow->contentTypeId,$geoContentTypeRow->contentType->contentType);
        }

        return parent::getContent();

    }

}