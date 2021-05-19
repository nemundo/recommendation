<?php

namespace Nemundo\Content\App\Notification\Page;

use Nemundo\Content\App\Notification\Com\Form\NotificationConfigForm;
use Nemundo\Content\App\Notification\Template\NotificationTemplate;

class ConfigPage extends NotificationTemplate
{
    public function getContent()
    {


        // send eMail

        new NotificationConfigForm($this);



        return parent::getContent();
    }
}