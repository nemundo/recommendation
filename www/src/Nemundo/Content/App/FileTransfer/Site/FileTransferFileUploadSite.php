<?php

namespace Nemundo\Content\App\FileTransfer\Site;

use Nemundo\Content\App\File\Parameter\FileTransferParameter;
use Nemundo\Content\App\FileTransfer\Data\File\File;
use Nemundo\Package\Dropzone\AbstractDropzoneUploadSite;
use Nemundo\Package\Dropzone\DropzoneFileRequest;
use Nemundo\Package\Dropzone\DropzoneHttpResponse;

class FileTransferFileUploadSite extends AbstractDropzoneUploadSite
{

    /**
     * @var FileTransferFileUploadSite
     */
    public static $site;

    protected function loadSite()
    {
        /* $this->title = 'UploadSave';
         $this->url = 'filetransferUploadSave';*/

        parent::loadSite();

        FileTransferFileUploadSite::$site = $this;

    }

    public function loadContent()
    {


        $data = new File();
        $data->fileTransferId = (new FileTransferParameter())->getValue();
        $data->file->fromFileRequest(new DropzoneFileRequest());
        $data->save();

        (new DropzoneHttpResponse())->sendResponse();

    }
}