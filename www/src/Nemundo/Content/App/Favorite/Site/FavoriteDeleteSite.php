<?php

namespace Nemundo\Content\App\Favorite\Site;

use Nemundo\Content\App\Favorite\Data\Favorite\FavoriteDelete;
use Nemundo\Content\App\Favorite\Icon\FavoriteIcon;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\FontAwesome\Icon\DeleteIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\User\Session\UserSession;

class FavoriteDeleteSite extends AbstractIconSite
{

    /**
     * @var FavoriteDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->icon = new DeleteIcon();
        $this->title = 'Favorit entfernen';
        $this->url = 'favorite-delete';
        $this->menuActive = false;
        $this->icon = new FavoriteIcon();

        FavoriteDeleteSite::$site = $this;

    }


    public function loadContent()
    {

        $delete = new FavoriteDelete();
        $delete->filter->andEqual($delete->model->contentId, (new ContentParameter())->getValue());
        $delete->filter->andEqual($delete->model->userId, (new UserSession())->userId);
        $delete->delete();

        $site = clone(FavoriteSite::$site);
        $site->redirect();

        //(new UrlReferer())->redirect();

    }

}