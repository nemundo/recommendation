<?php


namespace Nemundo\Content\App\Text\Content\RichText;


use Nemundo\Html\Block\ContentDiv;
use Nemundo\Html\Block\Div;
use Nemundo\Content\View\AbstractContentView;

class RichTextContentView extends AbstractContentView
{

    /**
     * @var RichTextContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='201dc107-4e65-4345-92d1-a63ff154dcea';
        $this->defaultView=true;

    }


    public function getContent()
    {

        $largeTextRow = $this->contentType->getDataRow();

        $div = new ContentDiv($this);
        $div->content = $largeTextRow->largeText;

        return parent::getContent();

    }

}