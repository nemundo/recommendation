<?php

namespace Nemundo\Content\App\ImageGallery\Site;

use Nemundo\Content\App\ImageGallery\Page\ImageGalleryPage;
use Nemundo\Web\Site\AbstractSite;

class ImageGallerySite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Image Gallery';
        $this->url = 'image-gallery';

        new ImageGalleryUploadSite($this);

    }

    public function loadContent()
    {
        (new ImageGalleryPage())->render();
    }
}