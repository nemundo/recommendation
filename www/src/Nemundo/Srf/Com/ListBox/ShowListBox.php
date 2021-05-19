<?php

namespace Nemundo\Srf\Com\ListBox;

use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Srf\Data\Show\ShowReader;
use Nemundo\Srf\Parameter\ShowParameter;

class ShowListBox extends BootstrapListBox
{

    protected function loadContainer()
    {
        parent::loadContainer();

        $this->name = (new ShowParameter())->getParameterName();
        $this->label = 'Show';

    }

    public function getContent()
    {

        $reader = new ShowReader();
        $reader->addOrder($reader->model->show);
        foreach ($reader->getData() as $showRow) {
            $this->addItem($showRow->id, $showRow->show);
        }

        return parent::getContent();
    }
}