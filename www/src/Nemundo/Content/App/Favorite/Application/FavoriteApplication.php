<?php

namespace Nemundo\Content\App\Favorite\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Favorite\Data\FavoriteModelCollection;
use Nemundo\Content\App\Favorite\Install\FavoriteInstall;
use Nemundo\Content\App\Favorite\Install\FavoriteUninstall;
use Nemundo\Content\App\Favorite\Site\FavoriteSite;

class FavoriteApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Favorite';
        $this->applicationId = 'bdff94b7-bbd3-48ed-bee9-233403ecdec5';
        $this->modelCollectionClass = FavoriteModelCollection::class;
        $this->installClass = FavoriteInstall::class;
        $this->uninstallClass = FavoriteUninstall::class;
        $this->appSiteClass = FavoriteSite::class;
    }
}