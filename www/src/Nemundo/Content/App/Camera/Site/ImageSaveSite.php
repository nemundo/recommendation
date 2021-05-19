<?php


namespace Nemundo\Content\App\Camera\Site;


use Nemundo\Content\App\Camera\Content\Camera\CameraContentImport;
use Nemundo\Core\System\PhpEnvironment;
use Nemundo\Package\Dropzone\DropzoneFileRequest;
use Nemundo\Package\Dropzone\DropzoneHttpResponse;
use Nemundo\Web\Site\AbstractSite;


class ImageSaveSite extends AbstractSite
{

    /**
     * @var ImageSaveSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'image-save';
        $this->menuActive = false;
        ImageSaveSite::$site = $this;
    }


    public function loadContent()
    {

        (new PhpEnvironment())->setTimeLimit(180);

        $upload = new CameraContentImport();
        $upload->fromFileRequest(new DropzoneFileRequest());

        (new DropzoneHttpResponse())->sendResponse();

    }
}