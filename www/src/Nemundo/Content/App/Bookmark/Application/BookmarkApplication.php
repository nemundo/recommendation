<?php

namespace Nemundo\Content\App\Bookmark\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Bookmark\Data\BookmarkModelCollection;
use Nemundo\Content\App\Bookmark\Install\BookmarkInstall;
use Nemundo\Content\App\Bookmark\Install\BookmarkUninstall;

class BookmarkApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Bookmark';
        $this->applicationId = '88ce9482-0ea2-40ba-9f11-f8995137adf0';
        $this->modelCollectionClass = BookmarkModelCollection::class;
        $this->installClass = BookmarkInstall::class;
        $this->uninstallClass = BookmarkUninstall::class;
    }
}