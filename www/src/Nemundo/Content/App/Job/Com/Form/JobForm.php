<?php


namespace Nemundo\Content\App\Job\Com\Form;


use Nemundo\Content\App\Job\Com\ListBox\JobListBox;
use Nemundo\Content\App\Job\Data\Job\JobReader;
use Nemundo\Content\App\Job\Data\JobScheduler\JobScheduler;
use Nemundo\Core\Debug\Debug;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;

class JobForm extends BootstrapForm
{

    /**
     * @var JobListBox
     */
    private $job;

    public function getContent()
    {

        $this->job = new JobListBox($this);
        $this->job->validation=true;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $jobReader= new JobReader();
        $jobReader->model->loadContentType();
        $jobRow =$jobReader->getRowById($this->job->getValue());

        $jobContentType = $jobRow->contentType->getContentType();
        $jobContentType->saveType();

    }

}