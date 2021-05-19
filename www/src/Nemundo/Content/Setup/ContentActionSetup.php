<?php


namespace Nemundo\Content\Setup;


use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\Data\ContentAction\ContentAction;
use Nemundo\Content\Data\ContentAction\ContentActionCount;
use Nemundo\Content\Data\ContentAction\ContentActionDelete;
use Nemundo\Content\Data\ContentAction\ContentActionUpdate;

class ContentActionSetup extends AbstractContentTypeSetup
{

    public function addContentAction(AbstractContentAction $contentAction)
    {

        parent::addContentType($contentAction);

        $count = new ContentActionCount();
        $count->filter->andEqual($count->model->contentTypeId, $contentAction->typeId);
        if ($count->getCount() == 0) {
            $data = new ContentAction();
            //$data->ignoreIfExists = true;
            $data->contentTypeId = $contentAction->typeId;
            $data->save();
        }
        /*else {
            $update = new ContentActionUpdate();
            //$data->ignoreIfExists = true;
            $data->contentTypeId = $contentAction->typeId;
            $data->save();

        }*/




        return $this;

    }

    public function removeContentAction(AbstractContentAction $contentAction)
    {

//        $this->removeType($contentAction);

        //parent::removeTContentType($contentAction);

        $delete=new ContentActionDelete();
        $delete->filter->andEqual($delete->model->contentTypeId, $contentAction->typeId);
        $delete->delete();

        return $this;

    }
}