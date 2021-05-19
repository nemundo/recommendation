<?php

namespace Nemundo\App\MySql\Page;

use Nemundo\App\MySql\Template\MySqlTemplate;
use Nemundo\App\MySql\Widget\GlobalVariableWidget;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class ConfigPage extends MySqlTemplate
{
    public function getContent()
    {

        $layout=new BootstrapTwoColumnLayout($this);

        new GlobalVariableWidget($layout->col1);

        return parent::getContent();
    }
}