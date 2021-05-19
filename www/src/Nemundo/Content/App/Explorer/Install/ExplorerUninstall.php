<?php

namespace Nemundo\Content\App\Explorer\Install;

use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Content\App\Explorer\Content\Container\ContainerContentType;
use Nemundo\Content\App\Explorer\Content\Container\ContainerRenameLogContentType;
use Nemundo\Content\App\Explorer\Data\ExplorerModelCollection;
use Nemundo\Content\App\Explorer\Store\HomeContentIdStore;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class ExplorerUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        (new ContentTypeSetup())
            ->removeContentType(new ContainerContentType());

        (new ModelCollectionSetup())
            ->removeCollection(new ExplorerModelCollection());

        (new ContentTypeSetup())
            ->addContentType(new ContainerContentType())
            ->addContentType(new ContainerRenameLogContentType());

        (new HomeContentIdStore())->removeStore();

    }
}