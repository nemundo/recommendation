<?php

namespace Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\View;

use Nemundo\Content\App\ImageTimeline\Data\Image\ImageReader;
use Nemundo\Package\Bootstrap\Carousel\BootstrapImageCarousel;

class ImageTimelineSliderContentView extends AbstractImageTimelineContentView
{

    protected function loadView()
    {

        $this->viewName = 'Image Slider';
        $this->viewId = 'd7f78b7e-7c08-4efb-8720-c3cb98368486';
        $this->defaultView = false;

    }


    public function getContent()
    {


        $timelineRow = $this->contentType->getDataRow();

        $carousel = new BootstrapImageCarousel($this);
        $carousel->slideEffect = false;

        $reader = new ImageReader();
        $reader->filter->andEqual($reader->model->timelineId, $this->contentType->getDataId());
        $reader->addOrder($reader->model->id);
        $reader->limit = 10;
        foreach ($reader->getData() as $imageRow) {
            $carousel->addImage($imageRow->image->getImageUrl($imageRow->model->imageAutoSize800));
        }


        /*
        if ($timelineRow->sourceUrl !== '') {

            $row = new BootstrapRow($this);

            $small = new Small($row);
            $small->content = 'Quelle: ' . $timelineRow->sourceUrl;

            $hyperlink = new UrlHyperlink($small);
            $hyperlink->content = $timelineRow->source;
            $hyperlink->url = $timelineRow->sourceUrl;


        }*/


        return parent::getContent();
    }
}