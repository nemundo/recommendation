<?php

namespace Nemundo\Content\App\Text\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\App\Text\Application\TextApplication;
use Nemundo\Content\App\Text\Content\TextContentTypeCollection;
use Nemundo\Content\App\Text\Data\TextModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class TextInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new TextApplication());

        (new ModelCollectionSetup())
            ->addCollection(new TextModelCollection());

        (new ContentTypeSetup(new TextApplication()))
            ->addContentTypeCollection(new TextContentTypeCollection());


    }
}