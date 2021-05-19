<?php


namespace Nemundo\Content\App\Text\Content\Html;


use Nemundo\Html\Block\ContentDiv;
use Nemundo\Html\Block\Div;
use Nemundo\Content\View\AbstractContentView;

class HtmlContentView extends AbstractContentView
{

    /**
     * @var HtmlContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='5c6fef6b-db08-44bb-a58b-a80c1e872d23';
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