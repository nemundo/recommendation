<?php

namespace Nemundo\Content\App\IssueTracker\Com\ListBox;

use Nemundo\Content\App\IssueTracker\Data\Priority\PriorityReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class PriorityListBox extends BootstrapListBox
{
    public function getContent()
    {
        $this->label = 'Priority';

        $reader=new PriorityReader();
        foreach ($reader->getData() as $priorityRow) {
            $this->addItem($priorityRow->id,$priorityRow->priority);
        }

        return parent::getContent();
    }
}