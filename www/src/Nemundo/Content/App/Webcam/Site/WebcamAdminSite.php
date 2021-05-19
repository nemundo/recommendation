<?php

namespace Nemundo\Content\App\Webcam\Site;

use Nemundo\Content\App\Webcam\Page\WebcamAdminPage;
use Nemundo\Web\Site\AbstractSite;

class WebcamAdminSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Admin';
        $this->url = 'admin';
    }

    public function loadContent()
    {
        (new WebcamAdminPage())->render();
    }
}