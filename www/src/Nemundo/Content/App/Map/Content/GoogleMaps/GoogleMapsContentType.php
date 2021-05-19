<?php

namespace Nemundo\Content\App\Map\Content\GoogleMaps;


use Nemundo\Content\Type\AbstractContentType;

class GoogleMapsContentType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'GoogleMaps';
        $this->typeId = 'f86ecd27-bd70-4dbd-bad1-aaec957bee88';
        $this->formClassList[] = GoogleMapsContentForm::class;
        $this->viewClassList[]  = GoogleMapsContentView::class;
        $this->dataId = 0;
    }

    protected function onCreate()
    {
    }

    protected function onUpdate()
    {
    }

    protected function onDataRow()
    {
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }
}