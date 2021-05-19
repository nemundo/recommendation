<?php

namespace Nemundo\App\System\Widget;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\System\Com\Table\ProjectTable;

class ProjectWidget extends AdminWidget
{

    public function getContent()
    {

        $this->widgetTitle = 'Project';

        new ProjectTable($this);

        return parent::getContent();

    }

}