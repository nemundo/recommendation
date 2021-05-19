<?php

namespace Nemundo\Content\App\Stream\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\App\Stream\Action\StreamContentAction;
use Nemundo\Content\App\Stream\Action\StreamDeleteContentAction;
use Nemundo\Content\App\Stream\Content\StreamWidget\StreamWidgetContentType;
use Nemundo\Content\App\Stream\Data\StreamModelCollection;
use Nemundo\Content\App\Stream\Usergroup\StreamUsergroup;
use Nemundo\Content\Setup\ContentActionSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;

class StreamInstall extends AbstractInstall
{
    public function install()
    {

        (new ModelCollectionSetup())
            ->addCollection(new StreamModelCollection());

        (new ContentActionSetup())
            ->addContentAction(new StreamDeleteContentAction())
            ->addContentAction(new StreamContentAction());


        (new ContentTypeSetup())
            ->addContentType(new StreamWidgetContentType());


        /*(new ContentTypeCollectionSetup())
            ->addContentTypeCollection(new StreamContentTypeCollection());*/

        (new UsergroupSetup())
            ->addUsergroup(new StreamUsergroup());

    }
}