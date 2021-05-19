<?php

namespace Nemundo\App\UserAction\Widget;


use Nemundo\Admin\Com\Widget\AbstractAdminWidget;
use Nemundo\App\UserAction\Form\UserChangeForm;


class UserChangeWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {
        $this->widgetTitle = 'User Change';
    }


    public function getContent()
    {

        new UserChangeForm($this);
        return parent::getContent();

    }

}