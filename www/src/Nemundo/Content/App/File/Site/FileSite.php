<?php

namespace Nemundo\Content\App\File\Site;

use Nemundo\Content\App\File\Data\Document\Redirect\DocumentDocumentRedirectSite;
use Nemundo\Content\App\File\Data\File\Redirect\FileFileRedirectSite;
use Nemundo\Content\App\File\Page\FilePage;
use Nemundo\Web\Site\AbstractSite;

class FileSite extends AbstractSite
{

    /**
     * @var FileSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'File';
        $this->url = 'file';

        FileSite::$site=$this;

        new DocumentSite($this);
        new ImageSite($this);
        new VideoSite($this);

        new UploadSite($this);
        new FileUploadSite($this);

        new DocumentDocumentRedirectSite($this);
        new FileFileRedirectSite($this);

    }

    public function loadContent()
    {
        (new FilePage())->render();
    }
}