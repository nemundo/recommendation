<?php

namespace Nemundo\Content\App\IssueTracker\Content\Cancel;

use Nemundo\Content\Index\Log\Type\AbstractLogContentType;
use Nemundo\Content\Type\AbstractContentType;

class CancelContentType extends AbstractLogContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Cancel';
        $this->typeId = '682e11e7-e021-4b5f-ae8d-00d71f74c952';
        $this->formClassList[] = CancelContentForm::class;
        $this->viewClassList[] = CancelContentView::class;
    }

    protected function onCreate()
    {
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