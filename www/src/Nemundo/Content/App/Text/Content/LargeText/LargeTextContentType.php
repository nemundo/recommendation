<?php


namespace Nemundo\Content\App\Text\Content\LargeText;


class LargeTextContentType extends AbstractLargeTextContentType
{

    public $largeText;


    protected function loadContentType()
    {

        $this->typeId = '1b4e6652-8f85-4cd8-b44a-1f50afb696ac';
        $this->typeLabel = 'Large Text';

        $this->formClassList[] = LargeTextContentForm::class;
        $this->formPartClass=LargeTextContentFormPart::class;
        $this->viewClassList[] = LargeTextContentView::class;



    }

}