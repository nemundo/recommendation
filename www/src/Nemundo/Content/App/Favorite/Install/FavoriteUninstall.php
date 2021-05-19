<?php

namespace Nemundo\Content\App\Favorite\Install;

use Nemundo\Content\App\Favorite\Action\FavoriteSaveContentAction;
use Nemundo\Content\App\Favorite\Content\FavoriteContentType;
use Nemundo\Content\App\Favorite\Data\FavoriteModelCollection;
use Nemundo\Content\Setup\ContentActionSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractUninstall;

class FavoriteUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        (new ContentTypeSetup())
            ->removeContentType(new FavoriteContentType());

        (new ContentActionSetup())
            ->removeContentAction(new FavoriteSaveContentAction());

        (new ModelCollectionSetup())
            ->removeCollection(new FavoriteModelCollection());

    }
}