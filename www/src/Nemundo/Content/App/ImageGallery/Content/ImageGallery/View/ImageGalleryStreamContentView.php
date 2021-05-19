<?php

namespace Nemundo\Content\App\ImageGallery\Content\ImageGallery\View;

use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Content\App\ImageGallery\Content\ImageGallery\ImageGalleryContentType;
use Nemundo\Content\App\ImageGallery\Data\Image\ImageReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\Carousel\BootstrapImageCarousel;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;
use Nemundo\Package\OpenGraph\OpenGraph;

class ImageGalleryStreamContentView extends AbstractContentView
{
    /**
     * @var ImageGalleryContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewName='Stream';
        $this->viewId='bda47aa4-011c-4bee-8d83-e4842a4ea2b5';
        $this->defaultView=false;

    }


    public function getContent()
    {



        $imageGalleryRow=$this->contentType->getDataRow();

        $imageReader=new ImageReader();
        $imageReader->filter->andEqual($imageReader->model->galleryId,$imageGalleryRow->id);
        $imageReader->addOrder($imageReader->model->id);
        foreach ($imageReader->getData() as $imageRow) {

            $img = new BootstrapResponsiveImage($this);
            $img->src = $imageRow->image->getImageUrl($imageReader->model->imageAutoSize1600);




        }

        return parent::getContent();

    }
}