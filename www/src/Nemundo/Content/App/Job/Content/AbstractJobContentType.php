<?php


namespace Nemundo\Content\App\Job\Content;


use Nemundo\Content\App\Job\Data\JobScheduler\JobScheduler;
use Nemundo\Content\App\Job\Data\JobScheduler\JobSchedulerDelete;
use Nemundo\Content\Type\AbstractContentType;

// AbstractJob
abstract class AbstractJobContentType extends AbstractContentType
{

    abstract public function run();

    public function saveType()
    {

        if ($this->dataId == null) {
            $this->dataId=0;
        }

        parent::saveType();

        $data = new JobScheduler();
        $data->contentId=$this->getContentId();
        $data->done = false;
        $data->save();

    }


    protected function onDelete()
    {

        $delete=new JobSchedulerDelete();
        $delete->filter->andEqual($delete->model->contentId,$this->getContentId());
        $delete->delete();

    }

}