<?php

namespace Nemundo\Content\App\Favorite\Site;

use Nemundo\Content\App\Favorite\Data\Favorite\FavoriteDelete;
use Nemundo\Content\App\Favorite\Parameter\FavoriteParameter;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class UserFavoriteDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var UserFavoriteDeleteSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Favorit löschen';
        $this->url = 'user-favorite-delete';

        UserFavoriteDeleteSite::$site = $this;

    }


    public function loadContent()
    {

        $favoriteId = (new FavoriteParameter())->getValue();
        (new FavoriteDelete())->deleteById($favoriteId);

        $site = clone(FavoriteSite::$site);
        $site->redirect();

    }

}