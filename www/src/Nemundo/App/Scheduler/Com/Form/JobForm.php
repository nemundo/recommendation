<?php

namespace Nemundo\App\Scheduler\Com\Form;


use Nemundo\App\Scheduler\Data\Job\Job;
use Nemundo\App\Scheduler\Status\PlannedSchedulerStatus;
use Nemundo\App\Script\Com\ListBox\ScriptListBox;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class JobForm extends BootstrapForm
{

    /**
     * @var ScriptListBox
     */
    private $script;


    public function getContent()
    {

        // application

        $formRow = new BootstrapRow($this);

        $this->script = new ScriptListBox($formRow);


        return parent::getContent();
    }


    protected function onSubmit()
    {

        $data = new Job();
        $data->scriptId = $this->script->getValue();
        $data->finished = false;
        $data->statusId = (new PlannedSchedulerStatus())->id;
        $data->save();

    }

}