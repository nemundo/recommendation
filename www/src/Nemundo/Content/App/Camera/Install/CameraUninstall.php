<?php

namespace Nemundo\Content\App\Camera\Install;

use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Content\App\Camera\Content\Camera\CameraContentType;
use Nemundo\Content\App\Camera\Data\CameraModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class CameraUninstall extends AbstractUninstall
{
    public function uninstall()
    {

        (new ContentTypeSetup())
            ->removeContent(new CameraContentType());

        (new ModelCollectionSetup())
            ->removeCollection(new CameraModelCollection());

    }
}