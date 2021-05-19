<?php

namespace Nemundo\Content\App\ImageGallery\Install;

use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Content\App\ImageGallery\Application\ImageGalleryApplication;
use Nemundo\Content\App\ImageGallery\Content\ImageGallery\ImageGalleryContentType;
use Nemundo\Content\App\ImageGallery\Data\ImageGalleryModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Content\Type\Index\ContentIndexBuilder;
use Nemundo\Model\Setup\ModelCollectionSetup;

class ImageGalleryUninstall extends AbstractUninstall
{
    public function uninstall()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new ImageGalleryModelCollection());


        (new ContentIndexBuilder(new ImageGalleryContentType()))
            ->removeAllIndex();


        (new ContentTypeSetup(new ImageGalleryApplication()))
            ->removeContentType(new ImageGalleryContentType());

    }
}