<?php

namespace Nemundo\Content\App\ImageGallery\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\ImageGallery\Content\ImageGallery\ImageGalleryContentType;

class ImageGalleryPage extends AbstractTemplateDocument
{
    public function getContent()
    {



        (new ImageGalleryContentType())->getListing($this);

        (new ImageGalleryContentType())->getDefaultForm($this);








        return parent::getContent();
    }
}