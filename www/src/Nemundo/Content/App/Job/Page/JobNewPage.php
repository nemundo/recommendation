<?php

namespace Nemundo\Content\App\Job\Page;

use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Content\App\Job\Com\Form\JobSaveForm;
use Nemundo\Content\App\Job\Com\ListBox\JobListBox;
use Nemundo\Content\App\Job\Data\Job\JobReader;
use Nemundo\Content\App\Job\Parameter\JobParameter;
use Nemundo\Content\App\Job\Site\JobSite;
use Nemundo\Content\App\Job\Template\JobTemplate;
use Nemundo\Html\Form\Input\HiddenInput;

class JobNewPage extends JobTemplate
{
    public function getContent()
    {

        $form = new SearchForm($this);

        $job = new JobListBox($form);
        $job->submitOnChange = true;
        $job->searchMode = true;


        if ($job->hasValue()) {

            $reader = new JobReader();
            $reader->model->loadContentType();
            $jobRow = $reader->getRowById($job->getValue());

            $jobType = $jobRow->getJob();

            if ($jobType->hasForm()) {

                $form = $jobRow->getJob()->getDefaultForm($this);
                $form->redirectSite = JobSite::$site;

                $hidden = new HiddenInput($form);
                $hidden->name = (new JobParameter())->getParameterName();
                $hidden->value = (new JobParameter())->getValue();

            } else {

                $form = new JobSaveForm($this);
                $form->job=$jobType;
                $form->redirectSite = JobSite::$site;

                $hidden = new HiddenInput($form);
                $hidden->name = (new JobParameter())->getParameterName();
                $hidden->value = (new JobParameter())->getValue();


            }

        }

        return parent::getContent();

    }

}