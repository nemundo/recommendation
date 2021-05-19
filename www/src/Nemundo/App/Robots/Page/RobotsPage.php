<?php

namespace Nemundo\App\Robots\Page;

use Nemundo\App\Robots\Com\Code\RobotsCode;
use Nemundo\App\Robots\Com\Form\RobotsForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class RobotsPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout=new BootstrapTwoColumnLayout($this);

        new RobotsForm($layout->col1);



        new RobotsCode($layout->col2);






        return parent::getContent();
    }
}