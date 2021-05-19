<?php

namespace Nemundo\App\FileLog\Site;

use Nemundo\App\FileLog\Parameter\FilenameParameter;
use Nemundo\Core\Http\Response\FileResponse;
use Nemundo\Web\Site\AbstractSite;

class FileLogDownloadSite extends AbstractSite
{

    /**
     * @var FileLogDownloadSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Download Log Files';
        $this->url = 'download-log-file';

        FileLogDownloadSite::$site = $this;
    }

    public function loadContent()
    {

        $parameter = new FilenameParameter();

        $response = new FileResponse();
        $response->filename = $parameter->getFullFilename();
        $response->responseFilename = $parameter->getValue();
        $response->sendResponse();

    }

}