<?php

namespace Nemundo\App\System\Widget;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\App\System\Com\Table\MailTable;
use Nemundo\App\System\Com\Table\ProjectTable;

class MailWidget extends AdminWidget
{

    public function getContent()
    {

        $this->widgetTitle = 'Mail';

        new MailTable($this);

        return parent::getContent();

    }

}