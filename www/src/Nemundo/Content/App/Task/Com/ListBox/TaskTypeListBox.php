<?php


namespace Nemundo\Content\App\Task\Com\ListBox;


use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Content\App\Task\Data\TaskType\TaskTypeReader;
use Nemundo\Content\App\Task\Parameter\TaskTypeParameter;

class TaskTypeListBox extends BootstrapListBox
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $this->name = (new TaskTypeParameter())->getParameterName();
        $this->label = 'Task Type';

    }

    public function getContent()
    {

        $reader = new TaskTypeReader();
        $reader->model->loadTaskType();
        $reader->addOrder($reader->model->taskType->contentType);
        foreach ($reader->getData() as $taskTypeRow) {
            $this->addItem($taskTypeRow->taskTypeId, $taskTypeRow->taskType->contentType);
        }

        return parent::getContent();

    }

}