<?php

namespace Nemundo\Content\App\Camera\Site;

use Nemundo\Content\App\Camera\Page\CameraPage;
use Nemundo\Web\Site\AbstractSite;

class CameraSite extends AbstractSite
{

    /**
     * @var CameraSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Camera';
        $this->url = 'camera';

        CameraSite::$site=$this;

        new UploadSite($this);


    }

    public function loadContent()
    {
        (new CameraPage())->render();
    }
}