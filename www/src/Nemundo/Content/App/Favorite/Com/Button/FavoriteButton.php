<?php

namespace Nemundo\Content\App\Favorite\Com\Button;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Content\App\Favorite\Data\Favorite\FavoriteCount;
use Nemundo\Content\App\Favorite\Site\FavoriteDeleteSite;
use Nemundo\Content\App\Favorite\Site\FavoriteSaveSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\User\Session\UserSession;
use Nemundo\User\Type\UserSessionType;


class FavoriteButton extends AbstractHtmlContainer
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    public function getContent()
    {


        $contentId = $this->contentType->getContentId();
        $contentParameter = new ContentParameter($contentId);

        $favoriteCount = new FavoriteCount();
        $favoriteCount->filter->andEqual($favoriteCount->model->contentId, $contentId);
        $favoriteCount->filter->andEqual($favoriteCount->model->userId, (new UserSession())->userId);

//        $button=null;
        $button = new AdminIconSiteButton($this);


        if ($favoriteCount->getCount() == 0) {
  //          $button = new AdminIconSiteButton($this);
            $button->site = FavoriteSaveSite::$site;
            $button->site->addParameter($contentParameter);

        } else {

    //        $button = new AdminIconSiteButton($this);
            $button->site = FavoriteDeleteSite::$site;
            $button->site->addParameter($contentParameter);

        }

        $button->showTitle=false;
        $button->title = $this->contentType->getSubject();


        return parent::getContent();

    }

}