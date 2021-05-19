<?php


namespace Nemundo\Content\App\Text\Content\Text;


use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Block\ContentDiv;

class TextContentView extends AbstractContentView
{

    /**
     * @var TextContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='f4da9caa-e07c-4974-ac12-1f53c24fe8cb';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $textRow = $this->contentType->getDataRow();

        $p = new ContentDiv($this);
        $p->content = $textRow->text;

        return parent::getContent();

    }

}