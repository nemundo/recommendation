<?php

namespace Nemundo\Content\App\Task\Page;


use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Task\Com\Container\TaskContainer;

class TaskPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        new TaskContainer($this);

        return parent::getContent();

    }

}