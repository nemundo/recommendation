<?php

namespace Nemundo\Content\App\FileTransfer\Site;

use Nemundo\Content\App\FileTransfer\Data\File\Redirect\FileFileRedirectSite;
use Nemundo\Content\App\FileTransfer\Page\FileTransferPage;
use Nemundo\Web\Site\AbstractSite;

class FileTransferSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'FileTransfer';
        $this->url = 'file-transfer';
        $this->menuActive=false;

        new FileTransferFileUploadSite($this);
        new FileFileRedirectSite($this);
        new FileDeleteSite($this);

    }

    public function loadContent()
    {
        (new FileTransferPage())->render();
    }
}