<?php

namespace Nemundo\Content\App\File\Content\Image\View;

use Nemundo\Admin\Com\Button\AdminUrlButton;
use Nemundo\Content\App\File\Content\Image\ImageContentType;
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

        $this->viewName='default';
        $this->viewId='3769aafc-c223-40ad-a9b3-33ea12629d7a';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $imageRow = $this->contentType->getDataRow();

       // $fancybox=new FancyboxHyperlink($this);
       // $fancybox->imageUrl= $imageRow->image->getUrl();

        $img = new BootstrapResponsiveImage($this);
        $img->src = $imageRow->image->getImageUrl($imageRow->model->imageAutoSize400);

        return parent::getContent();

    }
}