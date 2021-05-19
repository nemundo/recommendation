<?php

namespace Nemundo\Content\App\FileTransfer\Site;

use Nemundo\Content\App\FileTransfer\Data\File\FileDelete;
use Nemundo\Content\App\FileTransfer\Parameter\FileParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Web\Site\AbstractSite;

class FileDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var FileDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'FileDelete';
        $this->url = 'file-delete';
        $this->menuActive=false;
        FileDeleteSite::$site=$this;
    }

    public function loadContent()
    {

        (new FileDelete())->deleteById((new FileParameter())->getValue());
        (new UrlReferer())->redirect();

    }
}