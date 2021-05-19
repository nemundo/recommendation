<?php

namespace Nemundo\Content\App\File\Site;

use Nemundo\Content\App\File\Page\UploadPage;
use Nemundo\Web\Site\AbstractSite;

class UploadSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Upload';
        $this->url = 'upload';
    }

    public function loadContent()
    {
        (new UploadPage())->render();
    }
}