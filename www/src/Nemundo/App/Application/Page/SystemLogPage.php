<?php

namespace Nemundo\App\Application\Page;

use Nemundo\App\Application\Template\ApplicationTemplate;
use Nemundo\App\SystemLog\Com\Table\SystemLogTable;
use Nemundo\Com\Template\AbstractTemplateDocument;

class SystemLogPage extends ApplicationTemplate
{
    public function getContent()
    {

        $table=new SystemLogTable($this);


        return parent::getContent();
    }
}