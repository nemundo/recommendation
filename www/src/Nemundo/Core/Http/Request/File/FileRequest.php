<?php

namespace Nemundo\Core\Http\Request\File;


class FileRequest extends AbstractFileRequest
{

    public function __construct($requestName = null)
    {

        $this->requestName = $requestName;
        parent::__construct();

    }


    protected function loadRequest()
    {

    }

}