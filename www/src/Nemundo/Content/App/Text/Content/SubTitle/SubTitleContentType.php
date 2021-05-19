<?php

namespace Nemundo\Content\App\Text\Content\SubTitle;

use Nemundo\Content\App\Text\Content\Text\AbstractTextContentType;

class SubTitleContentType extends AbstractTextContentType
{

    protected function loadContentType()
    {
        $this->typeLabel = 'SubTitle';
        $this->typeId = '6d0758f4-eb7a-4b89-bda7-8b6fef089b56';
        $this->viewClassList[]  = SubTitleContentView::class;
    }

}