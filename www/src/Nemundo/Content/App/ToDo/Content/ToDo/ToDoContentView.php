<?php

namespace Nemundo\Content\App\ToDo\Content\ToDo;

use Nemundo\Content\View\AbstractContentView;

class ToDoContentView extends AbstractContentView
{
    /**
     * @var ToDoContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='abedb9fc-665f-4cc0-adde-8d02a3feff32';
        $this->defaultView=true;

        // TODO: Implement loadView() method.
    }

    public function getContent()
    {
        return parent::getContent();
    }
}