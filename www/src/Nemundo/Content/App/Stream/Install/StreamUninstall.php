<?php

namespace Nemundo\Content\App\Stream\Install;

use Nemundo\Content\App\Stream\Data\StreamModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractUninstall;


class StreamUninstall extends AbstractUninstall
{
    public function uninstall()
    {


        (new ModelCollectionSetup())
            ->removeCollection(new StreamModelCollection());


    }
}