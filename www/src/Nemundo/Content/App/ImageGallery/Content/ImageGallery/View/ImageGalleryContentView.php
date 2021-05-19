<?php

namespace Nemundo\Content\App\ImageGallery\Content\ImageGallery\View;

use Nemundo\Content\App\ImageGallery\Content\ImageGallery\ImageGalleryContentType;
use Nemundo\Content\App\ImageGallery\Data\Image\ImageReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Debug\Debug;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Carousel\BootstrapImageCarousel;
use Nemundo\Package\OpenGraph\OpenGraph;
use Nemundo\Web\ResponseConfig;

class ImageGalleryContentView extends AbstractContentView
{
    /**
     * @var ImageGalleryContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewName = 'Carousel';
        $this->viewId = 'd6290636-718a-4c60-ae18-04ee96674922';
        $this->defaultView = true;

    }


    public function getContent()
    {

        $p=new Paragraph($this);
        $p->content='image gallery';


        $imageGalleryRow = $this->contentType->getDataRow();

        /*
        $subtitle=new AdminSubtitle($this);
        $subtitle->content=$imageGalleryRow->imageGallery;*/

        $count = 0;

        $carousel = new BootstrapImageCarousel($this);

        /*$imageReader = new ImageReader();
        $imageReader->filter->andEqual($imageReader->model->galleryId, $imageGalleryRow->id);
        $imageReader->addOrder($imageReader->model->id);

        foreach ($imageReader->getData() as $imageRow) {*/
        $imageReader= $this->contentType->getDataReader();
        foreach ($imageReader->getData() as $imageRow) {

            $carousel->addImage($imageRow->image->getImageUrl($imageReader->model->imageAutoSize1600));

            //(new Debug())->write($imageRow->image->getImageUrl($imageReader->model->imageAutoSize1600));

            if ($count == 0) {
                /*$og = new OpenGraph($this);
                $og->title = $imageGalleryRow->imageGallery;
                $og->description = '';
                $og->imageUrl = $imageRow->image->getImageUrlWithDomain($imageReader->model->imageAutoSize800);*/

                //ResponseConfig::$title = $imageGalleryRow->imageGallery;
                //ResponseConfig::$imageUrl = $imageRow->image->getImageUrlWithDomain($imageReader->model->imageAutoSize800);

            }

            $count++;


        }

        return parent::getContent();
    }
}