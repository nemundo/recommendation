<?php

namespace Nemundo\Content\App\Widget\Content\UtcTime;

use Nemundo\Content\Form\ContentForm;
use Nemundo\Content\Type\AbstractContentType;

class UtcTimeContentType extends AbstractContentType
{
    protected function loadContentType()
    {

        $this->typeLabel = 'Utc Time';
        $this->typeId = '935be9f5-dec4-4257-bb21-51739f83c0d2';
        $this->formClassList[] = ContentForm::class;
        $this->viewClassList[] = UtcTimeContentView::class;

        $this->dataId = 0;

    }

}