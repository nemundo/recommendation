<?php

namespace Nemundo\Content\App\FileTransfer\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\FileTransfer\Application\FileTransferApplication;
use Nemundo\Content\App\FileTransfer\Content\FileTransfer\FileTransferContentType;
use Nemundo\Content\App\FileTransfer\Data\FileTransferModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class FileTransferInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new FileTransferApplication());

        (new ModelCollectionSetup())
            ->addCollection(new FileTransferModelCollection());

        (new ContentTypeSetup(new FileTransferApplication()))
            ->addContentType(new FileTransferContentType());



    }
}