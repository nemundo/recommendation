<?php

namespace Nemundo\Content\App\Favorite\Action;


use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\App\Favorite\Data\Favorite\Favorite;
use Nemundo\Content\App\Favorite\Data\Favorite\FavoriteCount;
use Nemundo\User\Session\UserSession;

class FavoriteSaveContentAction extends AbstractContentAction
{


    protected function loadContentType()
    {

        $this->typeLabel = 'Favorite Save';
        $this->typeId = 'e077f622-a1d7-4737-be3d-ada67c3cc8bc';
        $this->actionLabel = 'Save Favorite';

    }


    public function onAction()
    {

        $count = new FavoriteCount();
        $count->filter->andEqual($count->model->contentId, $this->actionContentId);
        $count->filter->andEqual($count->model->userId, (new UserSession())->userId);
        if ($count->getCount() == 0) {
        $data = new Favorite();
        //$data->ignoreIfExists = true;
        $data->contentId = $this->actionContentId;
        $data->userId = (new UserSession())->userId;
        $data->subject = '[No Subject]';
        $data->save();
        }

    }

}