<?php


namespace Nemundo\Content\App\Job\Index;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Job\Data\Job\JobDelete;
use Nemundo\Content\App\Job\Data\JobScheduler\JobScheduler;
use Nemundo\Content\App\Job\Data\JobScheduler\JobSchedulerDelete;
use Nemundo\Content\Type\Index\AbstractIndexBuilder;
use Nemundo\Content\Type\Index\ContentIndexBuilder;

class JobIndexBuilder extends AbstractIndexBuilder
{


    public function buildIndex()
    {


        $builder=new ContentIndexBuilder($this->contentType);
        $builder->buildIndex();
        
        $data = new JobScheduler();
        $data->contentId=$this->contentType->getContentId();
        $data->done = false;
        $data->save();

    }




    public function deleteIndex()
    {

        $delete=new JobSchedulerDelete();
        $delete->filter->andEqual($delete->model->contentId,$this->getContentId());
        $delete->delete();


        // TODO: Implement deleteIndex() method.
    }



    public function removeAllIndexByApplication(AbstractApplication $application)
    {

        $delete=new JobDelete();
        $delete->model->loadContentType();
        $delete->filter->andEqual($delete->model->contentType->applicationId,$application->applicationId);
        $delete->delete();


        $delete=new JobSchedulerDelete();
        $delete->model->loadContent()->content->loadContentType();
        $delete->filter->andEqual($delete->model->content->contentType->applicationId,$application->applicationId);
        $delete->delete();


    }


}