<?php

namespace Nemundo\Content\App\Webcam\Page;

use Nemundo\Content\App\Webcam\Content\Webcam\WebcamContentType;
use Nemundo\Content\App\Webcam\Template\WebcamTemplate;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class WebcamAdminPage extends WebcamTemplate
{
    public function getContent()
    {

        $layout=new BootstrapTwoColumnLayout($this);
        (new WebcamContentType())->getAdmin($layout->col1);

        return parent::getContent();

    }
}