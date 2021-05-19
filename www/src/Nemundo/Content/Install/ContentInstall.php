<?php


namespace Nemundo\Content\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Action\DeleteContentAction;
use Nemundo\Content\Action\EditContentAction;
use Nemundo\Content\Action\ViewContentAction;
use Nemundo\Content\Application\ContentApplication;
use Nemundo\Content\Data\ContentModelCollection;
use Nemundo\Content\Index\Relation\Application\RelationApplication;
use Nemundo\Content\Index\Search\Application\SearchApplication;
use Nemundo\Content\Index\Tree\Application\TreeApplication;
use Nemundo\Content\Script\ContentCheckScript;
use Nemundo\Content\Script\ContentCleanScript;
use Nemundo\Content\Script\ContentUpdateScript;
use Nemundo\Content\Script\ReIndexScript;
use Nemundo\Content\Setup\ContentActionSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class ContentInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new ContentApplication())
            ->addApplication(new SearchApplication())
            ->addApplication(new TreeApplication())
            ->addApplication(new RelationApplication());

        (new ModelCollectionSetup())
            ->addCollection(new ContentModelCollection());

        (new ScriptSetup(new ContentApplication()))
            ->addScript(new ReIndexScript())
            ->addScript(new ContentUpdateScript())
            ->addScript(new ContentCleanScript())
            ->addScript(new ContentCheckScript());


        (new ContentActionSetup())
            ->addContentAction(new DeleteContentAction())
            ->addContentAction(new EditContentAction())
            ->addContentAction(new ViewContentAction());

        (new SearchApplication())->installApp()->setAppMenuActive();
        (new TreeApplication())->installApp()->setAppMenuActive();

    }

}