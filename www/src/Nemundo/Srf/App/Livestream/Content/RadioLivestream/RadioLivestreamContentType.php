<?php

namespace Nemundo\Srf\App\Livestream\Content\RadioLivestream;

use Nemundo\Content\Form\ContentForm;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Srf\App\Livestream\Content\AbstractLivestreamContentType;
use Nemundo\Srf\App\Livestream\Data\RadioLivestream\RadioLivestream;
use Nemundo\Srf\App\Livestream\Data\RadioLivestream\RadioLivestreamDelete;
use Nemundo\Srf\App\Livestream\Data\RadioLivestream\RadioLivestreamId;


class RadioLivestreamContentType extends AbstractLivestreamContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'SRF Radio Livestream';
        $this->typeId = '6acc0f65-af55-44f1-936d-ce71f1a32931';
        $this->formClassList[] = ContentSearchForm::class;  // ContentForm::class;  // RadioLivestreamContentForm::class;
        $this->viewClassList[] = RadioLivestreamContentView::class;
    }

    protected function onCreate()
    {


        $data = new RadioLivestream();
        $data->updateOnDuplicate = true;
        $data->livestream = $this->livestream;
        $data->urn = $this->urn;
        $data->save();

        $id = new RadioLivestreamId();
        $id->filter->andEqual($id->model->urn, $this->urn);
        $this->dataId = $id->getId();

    }



    protected function onUpdate()
    {
    }

    protected function onDelete()
    {
        (new RadioLivestreamDelete())->deleteById($this->dataId);
    }


}