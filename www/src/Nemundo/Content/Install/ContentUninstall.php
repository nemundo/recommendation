<?php


namespace Nemundo\Content\Install;


use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Content\Data\ContentCollection;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class ContentUninstall extends AbstractUninstall
{

    public function uninstall()
    {
        $setup = new ModelCollectionSetup();
        $setup->removeCollection(new ContentCollection());
    }

}