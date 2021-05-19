<?php

namespace Nemundo\Content\App\Explorer\Site\Json;

use Nemundo\Content\App\Explorer\Page\_Json\JsonImportPage;
use Nemundo\Web\Site\AbstractSite;

class JsonImportSite extends AbstractSite
{

    /**
     * @var JsonImportSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'JsonImport';
        $this->url = 'json-import';
        $this->menuActive = false;

        JsonImportSite::$site = $this;

    }

    public function loadContent()
    {
        (new JsonImportPage())->render();
    }
}