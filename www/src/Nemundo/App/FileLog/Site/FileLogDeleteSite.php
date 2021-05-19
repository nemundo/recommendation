<?php

namespace Nemundo\App\FileLog\Site;

use Nemundo\App\FileLog\Script\FileLogDeleteScript;
use Nemundo\Web\Site\AbstractSite;

class FileLogDeleteSite extends AbstractSite
{

    /**
     * @var FileLogDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Delete All Log Files';
        $this->url = 'delete-file';

        FileLogDeleteSite::$site = $this;
    }

    public function loadContent()
    {

        (new FileLogDeleteScript())->run();
        FileLogSite::$site->redirect();

    }

}