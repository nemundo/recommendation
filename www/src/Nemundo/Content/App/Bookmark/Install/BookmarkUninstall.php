<?php


namespace Nemundo\Content\App\Bookmark\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Content\App\Bookmark\Application\BookmarkApplication;
use Nemundo\Content\App\Bookmark\Content\UrlContentType;
use Nemundo\Content\App\Bookmark\Data\BookmarkModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class BookmarkUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new BookmarkModelCollection());

        (new ContentTypeSetup(new BookmarkApplication()))
            ->removeContentType(new UrlContentType());

    }

}