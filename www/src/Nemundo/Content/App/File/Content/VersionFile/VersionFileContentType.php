<?php

namespace Nemundo\Content\App\File\Content\VersionFile;

use Nemundo\Content\Type\AbstractContentType;

class VersionFileContentType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'VersionFile';
        $this->typeId = 'ab3fdea0-ab3f-4f9e-9283-1c1b29263be4';
        $this->formClassList[] = VersionFileContentForm::class;
        $this->viewClassList[] = VersionFileContentView::class;
    }

    protected function onCreate()
    {
    }

    protected function onUpdate()
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