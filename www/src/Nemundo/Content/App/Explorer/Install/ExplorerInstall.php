<?php

namespace Nemundo\Content\App\Explorer\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\ContentPrint\Application\ContentPrintApplication;
use Nemundo\Content\App\Explorer\Application\ExplorerApplication;
use Nemundo\Content\App\Explorer\Content\Container\ContainerContentType;
use Nemundo\Content\App\Explorer\Content\Container\ContainerRenameLogContentType;
use Nemundo\Content\App\Explorer\Data\ExplorerModelCollection;
use Nemundo\Content\App\Explorer\Store\HomeContentIdStore;
use Nemundo\Content\App\PublicShare\Application\PublicShareApplication;
use Nemundo\Content\App\Share\Application\ShareApplication;
use Nemundo\Content\App\Store\Application\StoreApplication;
use Nemundo\Content\Index\Tree\Setup\RestrictedContentTypeSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class ExplorerInstall extends AbstractInstall
{

    public function install()
    {

        (new StoreApplication())->installApp();
        (new ContentPrintApplication())->installApp()->setAppMenuActive();

        (new PublicShareApplication())->installApp()->setAppMenuActive();
        (new ShareApplication())->installApp()->setAppMenuActive();


        (new ApplicationSetup())
            ->addApplication(new ExplorerApplication());

        (new ModelCollectionSetup())
            ->addCollection(new ExplorerModelCollection());

        (new ContentTypeSetup())
            ->addContentType(new ContainerContentType())
            ->addContentType(new ContainerRenameLogContentType());

        (new RestrictedContentTypeSetup(new ContainerContentType()))
            ->addRestrictedContentType(new ContainerContentType());

        $store = new HomeContentIdStore();
        if (!$store->hasValue()) {

            $container = new ContainerContentType();
            $container->container = 'Home';
            $container->saveType();

            $store->setValue($container->getContentId());

        }


    }
}