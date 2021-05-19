<?php

namespace Nemundo\Content\App\Webcam\Page;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Content\App\Webcam\Parameter\WebcamParameter;
use Nemundo\Content\App\Webcam\Template\WebcamTemplate;
use Nemundo\Package\Bootstrap\Carousel\BootstrapImageCarousel;

class WebcamItemPage extends WebcamTemplate
{

    public function getContent()
    {

        $webcamContentType = (new WebcamParameter())->getWebcamContentType();

        $title = new AdminTitle($this);
        $title->content = $webcamContentType->getSubject();

        $carousel = new BootstrapImageCarousel($this);
        $carousel->slideEffect = false;

        $reader = $webcamContentType->getWebcamImageReader();
        foreach ($reader->getData() as $imageRow) {
            $carousel->addImage($imageRow->image->getUrl());
        }

        return parent::getContent();

    }

}