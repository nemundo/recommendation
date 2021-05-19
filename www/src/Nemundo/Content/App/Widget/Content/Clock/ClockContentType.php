<?php

namespace Nemundo\Content\App\Widget\Content\Clock;

use Nemundo\Content\Form\ContentForm;
use Nemundo\Content\Type\AbstractContentType;

class ClockContentType extends AbstractContentType
{

    protected function loadContentType()
    {

        $this->typeLabel = 'Clock';
        $this->typeId = 'c319ecc9-b0f5-470c-a172-6ab0d7c291ff';
        $this->formClassList[] = ContentForm::class;
        $this->viewClassList[]  = ClockContentView::class;

        $this->dataId = 0;

    }

}