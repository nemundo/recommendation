<?php

namespace Nemundo\Content\App\ImageGallery\Site;

use Nemundo\Content\App\ImageGallery\Data\Image\ImageDelete;
use Nemundo\Content\App\ImageGallery\Parameter\ImageParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class ImageDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var ImageDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Delete Image';
        $this->url = 'image-delete';
        ImageDeleteSite::$site = $this;
    }

    public function loadContent()
    {

        $imageId = (new ImageParameter())->getValue();
        (new ImageDelete())->deleteById($imageId);

        (new UrlReferer())->redirect();

    }

}