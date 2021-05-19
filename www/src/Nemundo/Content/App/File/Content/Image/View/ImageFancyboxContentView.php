<?php

namespace Nemundo\Content\App\File\Content\Image\View;

use Nemundo\Content\App\File\Content\Image\ImageContentType;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;
use Nemundo\Package\Fancybox\FancyboxHyperlink;

class ImageFancyboxContentView extends AbstractContentView
{
    /**
     * @var ImageContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewName='Fancybox';
        $this->viewId='00a466d7-8bfd-41e1-8375-ae88e339ebdb';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $imageRow = $this->contentType->getDataRow();

        $fancybox = new FancyboxHyperlink($this);
        $fancybox->imageUrl = $imageRow->image->getImageUrl($imageRow->model->imageAutoSize1200);

        $img = new BootstrapResponsiveImage($fancybox);
        $img->src = $imageRow->image->getImageUrl($imageRow->model->imageAutoSize400);

        return parent::getContent();

    }

}