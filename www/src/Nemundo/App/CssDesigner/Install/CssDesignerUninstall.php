<?php

namespace Nemundo\App\CssDesigner\Install;

use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\App\CssDesigner\Data\CssDesignerModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;

class CssDesignerUninstall extends AbstractUninstall
{
    public function uninstall()
    {
        (new ModelCollectionSetup())->removeCollection(new CssDesignerModelCollection());
    }
}