<?php

namespace Nemundo\Content\App\Favorite\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\Content\App\Favorite\Action\FavoriteSaveContentAction;
use Nemundo\Content\App\Favorite\Application\FavoriteApplication;
use Nemundo\Content\App\Favorite\Content\FavoriteContentType;
use Nemundo\Content\App\Favorite\Data\FavoriteModelCollection;
use Nemundo\Content\Setup\ContentActionSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;

class FavoriteInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new FavoriteApplication());

        (new ModelCollectionSetup())
            ->addCollection(new FavoriteModelCollection());

        (new ContentTypeSetup())
            ->addContentType(new FavoriteContentType());

        (new ContentActionSetup())
            ->addContentAction(new FavoriteSaveContentAction());

    }
}