<?php

namespace Nemundo\Content\App\Contact\Content\Email;



use Nemundo\Content\Type\AbstractContentType;

class EmailContentType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Email';
        $this->typeId = 'ac76aba5-b806-4ed3-8a44-4b70f41c441d';
        $this->formClassList[] = EmailContentForm::class;
        $this->viewClassList[] = EmailContentView::class;
    }

    protected function onCreate()
    {
    }

    protected function onUpdate()
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