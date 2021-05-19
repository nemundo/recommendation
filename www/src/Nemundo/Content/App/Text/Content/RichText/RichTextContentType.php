<?php

namespace Nemundo\Content\App\Text\Content\RichText;


use Nemundo\Content\App\Text\Content\LargeText\AbstractLargeTextContentType;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Core\Type\Text\Text;


class RichTextContentType extends AbstractLargeTextContentType
{

    public $html;


    protected function loadContentType()
    {

        $this->typeLabel = 'Richt Text';
        $this->typeId = '76bbc22a-0b19-4e69-8a50-c988464a298e';

        $this->formClassList[] = RichTextContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;
        $this->viewClassList[] = RichTextContentView::class;

    }


    public function saveType()
    {
        $this->largeText = $this->html;
        parent::saveType();
    }


    public function getSubject()
    {

        $text = (new Text($this->getDataRow()->largeText))->removeHtmlTags()->substring(0, 100)->getValue() . ' ...';
        return $text;

    }

}