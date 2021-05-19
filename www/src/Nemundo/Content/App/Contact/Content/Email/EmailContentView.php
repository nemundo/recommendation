<?php

namespace Nemundo\Content\App\Contact\Content\Email;

use Nemundo\Content\View\AbstractContentView;

class EmailContentView extends AbstractContentView
{
    /**
     * @var EmailContentType
     */
    public $contentType;

    protected function loadView()
    {
        $this->viewName = '';
        $this->viewId = '';
        $this->defaultView = true;
    }

    public function getContent()
    {
        return parent::getContent();
    }
}