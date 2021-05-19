<?php

namespace Nemundo\Content\Index\Tree\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\Index\Tree\Action\ChildOrder\ChildOrderContentAction;
use Nemundo\Content\Index\Tree\Action\ViewChange\ViewChangeContentAction;
use Nemundo\Content\Index\Tree\Application\TreeApplication;
use Nemundo\Content\Index\Tree\Data\TreeModelCollection;
use Nemundo\Content\Index\Tree\Type\TreeIndexType;
use Nemundo\Content\Setup\ContentActionSetup;
use Nemundo\Content\Setup\IndexTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class TreeInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())->addApplication(new TreeApplication());
        (new ModelCollectionSetup())->addCollection(new TreeModelCollection());

        (new ContentActionSetup())
            ->addContentAction(new ChildOrderContentAction())
            ->addContentAction(new ViewChangeContentAction());

        (new IndexTypeSetup())->addIndexType(new TreeIndexType());

    }
}