<?php

namespace Nemundo\Content\App\ImageGallery\Site;

use Nemundo\Content\App\ImageGallery\Page\ImageGalleryPage;
use Nemundo\Web\Site\AbstractSite;

class ImageGallerySite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'ImageGallery';
        $this->url = 'image-gallery';

        new ImageDeleteSite($this);

    }

    public function loadContent()
    {
        (new ImageGalleryPage())->render();
    }
}