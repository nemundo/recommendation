<?php

namespace Nemundo\Content\App\Job\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\App\Job\Data\JobScheduler\JobSchedulerDelete;
use Nemundo\Content\App\Job\Data\JobScheduler\JobSchedulerReader;

class JobCleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'job-clean';
    }

    public function run()
    {


        $reader=new JobSchedulerReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();
        foreach ($reader->getData() as $schedulerRow) {
            $contentType=$schedulerRow->content->getContentType();
            $contentType->deleteType();
        }


        (new JobSchedulerDelete())->delete();


    }
}