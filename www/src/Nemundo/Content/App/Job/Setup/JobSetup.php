<?php


namespace Nemundo\Content\App\Job\Setup;


use Nemundo\Content\App\Job\Content\AbstractJobContentType;
use Nemundo\Content\App\Job\Data\Job\Job;
use Nemundo\Content\App\Job\Data\Job\JobCount;
use Nemundo\Content\App\Job\Data\Job\JobDelete;
use Nemundo\Content\Setup\AbstractContentTypeSetup;
use Nemundo\Content\Type\AbstractContentType;

class JobSetup extends AbstractContentTypeSetup
{

    public function addJob(AbstractJobContentType $jobContentType)
    {

        $this->addContentType($jobContentType);

        $count = new JobCount();
        $count->filter->andEqual($count->model->contentTypeId, $jobContentType->typeId);
        if ($count->getCount() == 0) {
            $data = new Job();
            $data->job = $jobContentType->typeLabel;
            $data->contentTypeId = $jobContentType->typeId;
            $data->save();
        }

        return $this;

    }


    public function removeJob(AbstractJobContentType $jobContentType)
    {

        $delete = new JobDelete();
        $delete->filter->andEqual($delete->model->contentTypeId, $jobContentType->typeId);
        $delete->delete();

        return $this->removeContentType($jobContentType);

    }

}