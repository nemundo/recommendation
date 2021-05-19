<?php


namespace Nemundo\Content\App\File\Site;


use Nemundo\Content\App\File\Content\Upload\UploadFile;
use Nemundo\Content\Index\Tree\Parameter\ParentParameter;
use Nemundo\Core\System\PhpEnvironment;
use Nemundo\Package\Dropzone\DropzoneFileRequest;
use Nemundo\Package\Dropzone\DropzoneHttpResponse;
use Nemundo\Web\Site\AbstractSite;


class FileUploadSite extends AbstractSite
{

    /**
     * @var FileUploadSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'save';
        $this->menuActive = false;
        FileUploadSite::$site = $this;
    }


    public function loadContent()
    {

        (new PhpEnvironment())->setTimeLimit(180);

        $upload = new UploadFile();
        $upload->parentId = (new ParentParameter())->getValue();
        $upload->file->fromFileRequest(new DropzoneFileRequest());
        $upload->uploadFile();

        (new DropzoneHttpResponse())->sendResponse();

    }
}