<?php


namespace Nemundo\Content\Reset;


use Nemundo\Content\Data\ContentType\ContentTypeDelete;
use Nemundo\Content\Data\ContentType\ContentTypeUpdate;
use Nemundo\Content\Data\ContentView\ContentViewDelete;
use Nemundo\Content\Data\ContentView\ContentViewUpdate;
use Nemundo\Project\Reset\AbstractReset;

class ContentReset extends AbstractReset
{

    public function reset()
    {

        $update = new ContentTypeUpdate();
        $update->setupStatus = false;
        $update->update();


        $update = new ContentViewUpdate();
        $update->setupStatus=false;
        $update->update();

    }


    public function remove()
    {

        $delete = new ContentTypeDelete();
        $delete->filter->andEqual($delete->model->setupStatus, false);
        $delete->delete();


        $delete = new ContentViewDelete();
        $delete->filter->andEqual($delete->model->setupStatus, false);
        $delete->delete();


    }

}