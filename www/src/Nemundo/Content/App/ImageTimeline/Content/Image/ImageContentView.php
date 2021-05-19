<?php

namespace Nemundo\Content\App\ImageTimeline\Content\Image;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;
use Nemundo\Package\Fancybox\FancyboxHyperlink;

class ImageContentView extends AbstractContentView
{
    /**
     * @var ImageContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName = 'default';
        $this->viewId = '77281b4b-54f5-4dfe-9ae1-8d04da7f93c1';
        $this->defaultView = true;

    }

    public function getContent()
    {

        $imageRow = $this->contentType->getDataRow();

        $fancybox = new FancyboxHyperlink($this);
        $fancybox->imageUrl = $imageRow->image->getImageUrl($imageRow->model->imageAutoSize1600);

        $img = new BootstrapResponsiveImage($fancybox);
        $img->src = $imageRow->image->getImageUrl($imageRow->model->imageAutoSize800);


        return parent::getContent();
    }
}