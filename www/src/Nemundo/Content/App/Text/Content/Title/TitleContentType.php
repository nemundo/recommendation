<?php

namespace Nemundo\Content\App\Text\Content\Title;

use Nemundo\Content\App\Text\Content\Text\AbstractTextContentType;


// TextTitle
// TitleText
class TitleContentType extends AbstractTextContentType
{


    /**
     * @var int (1-6)
     */
    public $size = 1;

    // titleSize


    protected function loadContentType()
    {



        $this->typeLabel = 'Title';
        $this->typeId = '10d0e29d-ab6a-4816-b58a-ad2667310957';
        $this->viewClassList[]  = TitleContentView::class;

    }

}