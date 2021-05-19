<?php

namespace Nemundo\Content\App\Favorite\Site;

use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Content\App\Favorite\Data\Favorite\Favorite;
use Nemundo\Content\App\Favorite\Icon\EmptyFavoriteIcon;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\User\Session\UserSession;

class FavoriteSaveSite extends AbstractIconSite
{

    /**
     * @var FavoriteSaveSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Favorite Save';
        $this->url = 'favorite-save';
        $this->menuActive = false;
        $this->icon = new EmptyFavoriteIcon();

        new FavoriteDeleteSite($this);

        FavoriteSaveSite::$site = $this;

    }


    public function loadContent()
    {

        $contentParameter = new ContentParameter();
        $contentParameter->contentTypeCheck = false;
        //$contentType = $contentParameter->getContentType();

        $data = new Favorite();
        $data->ignoreIfExists=true;
        $data->contentId = (new ContentParameter())->getValue();
        $data->userId = (new UserSession())->userId;
        $data->subject = '[No Subject]';
        $data->save();

        //$contentType->saveIndex();

        (new UrlReferer())->redirect();

    }

}