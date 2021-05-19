<?php


namespace Nemundo\App\Scheduler\Com\ListBox;


use Nemundo\App\Scheduler\Data\SchedulerStatus\SchedulerStatusReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class SchedulerStatusListBox extends BootstrapListBox
{

    public function getContent()
    {

        $this->label='Status';

        $reader = new SchedulerStatusReader();
        foreach ($reader->getData() as $schedulerStatusRow) {
            $this->addItem($schedulerStatusRow->id,$schedulerStatusRow->schedulerStatus);
        }

        return parent::getContent();

    }

}