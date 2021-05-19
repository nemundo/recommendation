<?php

namespace Nemundo\Content\App\ImageTimeline\Content\ImageCarousel;

use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Carousel\BootstrapImageCarousel;

class ImageCarouselContentView extends AbstractContentView
{
    /**
     * @var ImageCarouselContentType
     */
    public $contentType;

    protected function loadView()
    {
        $this->viewName = 'default';
        $this->viewId = '3f98e080-e10b-4d3e-a971-475c6b9c6f09';
        $this->defaultView = true;
    }

    public function getContent()
    {

        $dataRow = $this->contentType->getDataRow();

        $carousel = new BootstrapImageCarousel($this);
        $carousel->slideEffect = false;

        $reader = new ImageReader();
        $reader->filter->andEqual($reader->model->timelineId, $dataRow->imageTimelineId);
        $reader->addOrder($reader->model->id,SortOrder::DESCENDING);
        $reader->limit =$dataRow->imageCount;
        $reader->reverse=true;
        foreach ($reader->getData() as $imageRow) {
            $carousel->addImage($imageRow->image->getImageUrl($imageRow->model->imageAutoSize800));
        }


        return parent::getContent();
    }
}