<?php

namespace Nemundo\App\Application\Com\ListBox;

use Nemundo\App\Application\Data\Project\ProjectReader;
use Nemundo\App\Application\Parameter\ProjectParameter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class ProjectListBox extends BootstrapListBox
{


    protected function loadContainer()
    {
        parent::loadContainer();
        $this->name = (new ProjectParameter())->getParameterName();
    }


    public function getContent()
    {
        $this->label = 'Project';

        $reader = new ProjectReader();
        $reader->addOrder($reader->model->project);
        foreach ($reader->getData() as $projectRow) {
            $this->addItem($projectRow->id, $projectRow->project);
        }

        return parent::getContent();
    }
}