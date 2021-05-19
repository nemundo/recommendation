<?php

namespace Nemundo\Admin\UniqueId\Widget;


use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


class UniqueIdAdminWidget extends AbstractAdminWidget
{


    protected function loadWidget()
    {
        $this->widgetTitle = '';
        $this->widgetId = '';
    }


    public function getContent()
    {


        $this->widgetTitle = 'Unique Id';

        $textbox = new BootstrapTextBox($this);
        $textbox->label = 'Unique Id';
        $textbox->value = (new UniqueId())->getUniqueId();

        return parent::getContent();

    }

}