<?php


namespace Nemundo\Package\Dropzone;


use Nemundo\Core\Http\Request\File\AbstractFileRequest;

class DropzoneFileRequest extends AbstractFileRequest
{

    protected function loadRequest()
    {
        $this->requestName='file';
    }

}