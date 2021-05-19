<?php

namespace Nemundo\Content\App\Text\Content\Title;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Heading\H1;

class TitleContentView extends AbstractContentView
{
    /**
     * @var TitleContentType
     */
    public $contentType;

    protected function loadView()
    {
        // TODO: Implement loadView() method.
    }

    public function getContent()
    {

        $textRow=$this->contentType->getDataRow();

        $h1=new H1($this);
        $h1->content = $textRow->text;

        return parent::getContent();
    }
}