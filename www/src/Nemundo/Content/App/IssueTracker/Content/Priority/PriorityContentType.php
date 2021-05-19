<?php

namespace Nemundo\Content\App\IssueTracker\Content\Priority;

use Nemundo\Content\App\IssueTracker\Data\Priority\Priority;
use Nemundo\Content\Type\AbstractContentType;

class PriorityContentType extends AbstractContentType
{

    public $priority;

    protected function loadContentType()
    {
        $this->typeLabel = 'Priority';
        $this->typeId = 'b662f91e-003c-4169-b233-cb3ad2cf8aed';
        $this->formClassList[] = PriorityContentForm::class;
        //$this->viewClassList[] = PriorityContentView::class;

        $this->adminClass=PriorityContentAdmin::class;

    }

    protected function onCreate()
    {

        $data=new Priority();
        $data->priority=$this->priority;
        $data->save();

    }

    protected function onUpdate()
    {
    }

    protected function onDelete()
    {
    }

    protected function onIndex()
    {
    }

    protected function onDataRow()
    {
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }
}