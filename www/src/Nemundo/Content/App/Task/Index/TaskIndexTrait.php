<?php


namespace Nemundo\Content\App\Task\Index;


use Nemundo\Content\App\Task\Data\TaskIndex\TaskIndex;
use Nemundo\Content\App\Task\Data\TaskIndex\TaskIndexCount;
use Nemundo\Content\App\Task\Data\TaskIndex\TaskIndexDelete;
use Nemundo\Content\App\Task\Data\TaskIndex\TaskIndexUpdate;


trait TaskIndexTrait
{

    abstract protected function getDeadline();


    protected function saveTaskIndex()
    {


        $count=new TaskIndexCount();
        $count->filter->andEqual($count->model->contentId, $this->getContentId());
        if ($count->getCount() == 0) {

                $data = new TaskIndex();
                //$data->updateOnDuplicate = true;
                $data->contentId = $this->getContentId();
                $data->task = $this->getSubject();
                $data->deadline = $this->getDeadline();
                $data->save();

        } else {


        }



    }


    protected function deleteTaskIndex()
    {

        $delete = new TaskIndexDelete();
        $delete->filter->andEqual($delete->model->contentId, $this->getContentId());
        $delete->delete();

    }


}