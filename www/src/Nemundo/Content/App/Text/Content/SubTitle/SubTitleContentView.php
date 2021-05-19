<?php

namespace Nemundo\Content\App\Text\Content\SubTitle;

use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Heading\H1;

class SubTitleContentView extends AbstractContentView
{
    /**
     * @var SubTitleContentType
     */
    public $contentType;

    protected function loadView()
    {
        // TODO: Implement loadView() method.
    }

    public function getContent()
    {

        $textRow=$this->contentType->getDataRow();

        $h1=new AdminSubtitle($this);
        $h1->content = $textRow->text;

        return parent::getContent();
    }
}