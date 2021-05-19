<?php

namespace Nemundo\Content\App\ImageTimeline\Content\ImageCarousel;

use Nemundo\Content\App\ImageTimeline\Data\ImageCarousel\ImageCarouselReader;
use Nemundo\Content\App\ImageTimeline\Data\ImageCarousel\ImageCarouselRow;
use Nemundo\Content\Type\AbstractContentType;

class ImageCarouselContentType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Image Carousel';
        $this->typeId = 'c02184e4-cb73-4ea5-80af-fa475a458439';
        $this->formClassList[] = ImageCarouselContentForm::class;
        $this->viewClassList[] = ImageCarouselContentView::class;
    }

    protected function onCreate()
    {
    }

    protected function onUpdate()
    {
    }

    protected function onDelete()
    {
    }

    protected function onIndex()
    {
    }

    protected function onDataRow()
    {

        $reader = new ImageCarouselReader();
        $reader->model->loadImageTimeline();
        $this->dataRow = $reader->getRowById($this->getDataId());

    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|ImageCarouselRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->imageTimeline->timeline;
    }


}