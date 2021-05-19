<?php

namespace Nemundo\Content\App\Text\Install;

use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Content\App\Text\Application\TextApplication;
use Nemundo\Content\App\Text\Content\TextContentTypeCollection;
use Nemundo\Content\App\Text\Data\TextCollection;
use Nemundo\Content\App\Text\Data\TextModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class TextUninstall extends AbstractUninstall
{


    public function uninstall()
    {

        (new ContentTypeSetup(new TextApplication()))
            ->removeContentTypeCollection(new TextContentTypeCollection());


        (new ModelCollectionSetup())
            ->removeCollection(new TextModelCollection());

    }
}