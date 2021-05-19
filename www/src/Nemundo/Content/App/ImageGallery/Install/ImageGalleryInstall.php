<?php

namespace Nemundo\Content\App\ImageGallery\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\ImageGallery\Application\ImageGalleryApplication;
use Nemundo\Content\App\ImageGallery\Content\ImageGallery\ImageGalleryContentType;
use Nemundo\Content\App\ImageGallery\Data\ImageGalleryModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class ImageGalleryInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new ImageGalleryApplication());

        (new ModelCollectionSetup())
            ->addCollection(new ImageGalleryModelCollection());

        (new ContentTypeSetup(new ImageGalleryApplication()))
            ->addContentType(new ImageGalleryContentType());

    }
}