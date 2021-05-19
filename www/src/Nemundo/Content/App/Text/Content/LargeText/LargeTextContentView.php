<?php


namespace Nemundo\Content\App\Text\Content\LargeText;


use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Html\Block\ContentDiv;

class LargeTextContentView extends AbstractContentView
{

    /**
     * @var LargeTextContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewName = 'default';
        $this->viewId = '43f5cb0d-0c70-4c6c-a33c-244dfea6dfb8';
        $this->defaultView = true;

    }

    public function getContent()
    {

        $largeTextRow = $this->contentType->getDataRow();

        $p = new ContentDiv($this);
        $p->content = (new Html($largeTextRow->largeText))->getValue();

        return parent::getContent();

    }

}