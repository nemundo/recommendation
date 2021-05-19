<?php

namespace Nemundo\Content\App\PublicShare\Action;


use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicShare;
use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicShareCount;
use Nemundo\Content\Builder\ContentBuilder;


class PublicShareAction extends AbstractContentAction
{

    protected function loadContentType()
    {

        $this->typeLabel = 'Public Share';
        $this->typeId = 'e32bf906-941a-43aa-b153-610c87155bc0';
        $this->actionLabel = 'Share (public)';

        $this->viewClassList[] = PublicShareView::class;
        $this->formClassList[] = PublicShareActionForm::class;
        //$this->viewSite=PublicShareEditSite::$site;

    }


    public function onAction()
    {


        $count = new PublicShareCount();
        $count->filter->andEqual($count->model->contentId, $this->actionContentId);
        if ($count->getCount() == 0) {

            $data = new PublicShare();
            //$data->ignoreIfExists = true;
            $data->contentId = $this->actionContentId;
            $data->viewId = (new ContentBuilder())->getContent($this->actionContentId)->getDefaultViewId();
            $data->save();
        }

    }


}