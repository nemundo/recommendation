<?php


namespace Nemundo\Content\App\Job\Com\Form;


use Nemundo\Content\App\Job\Content\AbstractJobContentType;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;

class JobRunForm extends BootstrapForm
{

    /**
     * @var AbstractJobContentType
     */
    public $job;

    public function getContent()
    {

        $this->submitButton->label = 'Run';

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $this->job->run();
        exit;

    }

}