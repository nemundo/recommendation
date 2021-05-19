<?php

namespace Nemundo\Content\App\Widget\Content\UniqueId;

use Nemundo\Admin\Com\Button\AdminCopyButton;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class UniqueIdContentView extends AbstractContentView
{
    /**
     * @var UniqueIdContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='b1f62de8-6c1c-4bbc-b3b1-7334ece9adbb';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $textbox = new BootstrapTextBox($this);
        $textbox->label = 'Unique Id';
        $textbox->name='unique_id';
        $textbox->value = (new UniqueId())->getUniqueId();

        $btn=new AdminCopyButton($this);
        $btn->copyId = $textbox->name;

        return parent::getContent();

    }
}