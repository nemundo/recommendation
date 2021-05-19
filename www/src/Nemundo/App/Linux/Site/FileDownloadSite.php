<?php

namespace Nemundo\App\Linux\Site;

use Nemundo\App\Linux\Parameter\FilenameParameter;
use Nemundo\Core\Http\Response\FileResponse;
use Nemundo\Core\Type\File\File;
use Nemundo\Web\Site\AbstractSite;

class FileDownloadSite extends AbstractSite
{

    /**
     * @var FileDownloadSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'FileDownload';
        $this->url = 'FileDownload';
        $this->menuActive=false;

        FileDownloadSite::$site=$this;

    }

    public function loadContent()
    {

        $filename = (new FilenameParameter())->getValue();

        $response = new FileResponse();
        $response->filename = $filename;
        $response->responseFilename=(new File($filename))->filename;
        $response->sendResponse();



    }
}