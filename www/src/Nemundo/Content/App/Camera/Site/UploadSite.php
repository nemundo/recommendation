<?php

namespace Nemundo\Content\App\Camera\Site;

use Nemundo\Content\App\Camera\Page\UploadPage;
use Nemundo\Web\Site\AbstractSite;

class UploadSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Upload';
        $this->url = 'upload';

        new ImageSaveSite($this);
        new ZipDownloadSite($this);

    }

    public function loadContent()
    {
        (new UploadPage())->render();
    }
}