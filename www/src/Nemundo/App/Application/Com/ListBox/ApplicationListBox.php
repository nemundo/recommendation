<?php

namespace Nemundo\App\Application\Com\ListBox;


use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class ApplicationListBox extends BootstrapListBox
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $this->name = (new ApplicationParameter())->getParameterName();
        $this->label = 'Application';

    }


    public function getContent()
    {

        $reader = new ApplicationReader();
        $reader->filter->andEqual($reader->model->install,true);
        $reader->addOrder($reader->model->application);
        foreach ($reader->getData() as $applicationRow) {
            $this->addItem($applicationRow->id, $applicationRow->application);
        }

        return parent::getContent();

    }

}