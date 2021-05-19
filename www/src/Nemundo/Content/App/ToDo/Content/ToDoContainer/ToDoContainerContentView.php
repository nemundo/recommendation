<?php

namespace Nemundo\Content\App\ToDo\Content\ToDoContainer;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Content\View\AbstractContentView;

class ToDoContainerContentView extends AbstractContentView
{
    /**
     * @var ToDoContainerContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='dba3174c-a966-471c-9992-e571f2e811fa';
        $this->defaultView=true;

        // TODO: Implement loadView() method.
    }

    public function getContent()
    {


        $table=new AdminTable($this);

        $header=new AdminTableHeader($table);
        $header->addText('To Do');




        return parent::getContent();
    }
}