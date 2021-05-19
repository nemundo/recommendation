<?php

namespace Nemundo\Content\App\Camera\Site;

use Nemundo\Content\App\Camera\Page\CameraStreamPage;
use Nemundo\Web\Site\AbstractSite;

class CameraStreamSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'Stream';
        $this->url = 'stream';

        new ImageDownloadSite($this);

    }

    public function loadContent()
    {
        (new CameraStreamPage())->render();
    }
}