<?php

namespace Nemundo\Content\App\Favorite\Site;

use Nemundo\Content\App\Favorite\Page\FavoritePage;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Web\Site\AbstractSite;

class FavoriteSite extends AbstractSite
{

    /**
     * @var FavoriteSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Favoriten';

        /*
        $this->title[LanguageCode::EN] = 'Favorite';
        $this->title[LanguageCode::DE] = 'Favoriten';*/

        $this->url = 'favorite';

        new FavoriteSaveSite($this);
        new FavoriteDeleteSite($this);

        FavoriteSite::$site = $this;

        new UserFavoriteDeleteSite($this);

    }

    public function loadContent()
    {

        (new FavoritePage())->render();

    }
}