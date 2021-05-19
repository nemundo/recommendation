<?php


namespace Nemundo\Content\App\Favorite\Type;


use Nemundo\Content\App\Favorite\Data\Favorite\FavoriteReader;

trait FavoriteTrait
{


    public function sendFavoriteNotification() {

        $favoriteReader = new FavoriteReader();
        $favoriteReader->filter->andEqual($favoriteReader->model->contentId, $this->getContentId());
        foreach ($favoriteReader->getData() as $favoriteRow) {
            $this->sendUserNotification($favoriteRow->userId);
        }

    }


}