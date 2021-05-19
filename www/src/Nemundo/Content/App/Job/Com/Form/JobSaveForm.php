<?php


namespace Nemundo\Content\App\Job\Com\Form;


use Nemundo\Content\App\Job\Content\AbstractJobContentType;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;

class JobSaveForm extends BootstrapForm
{

    /**
     * @var AbstractJobContentType
     */
    public $job;

    protected function onSubmit()
    {

        $this->job->saveType();

    }

}