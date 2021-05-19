<?php


namespace Nemundo\Content\App\Bookmark\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Bookmark\Application\BookmarkApplication;
use Nemundo\Content\App\Bookmark\Content\UrlContentType;
use Nemundo\Content\App\Bookmark\Data\BookmarkModelCollection;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class BookmarkInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new BookmarkApplication());

        (new ModelCollectionSetup())
            ->addCollection(new BookmarkModelCollection());

        (new ContentTypeSetup(new BookmarkApplication()))
            ->addContentType(new UrlContentType());

    }

}