<?php

namespace Nemundo\Package\JqueryFileUpload;


use Nemundo\Com\Package\AbstractPackage;

class JqueryFileUploadPackage extends AbstractPackage
{

    protected function loadPackage()
    {

        $this->packageName = 'jquery_file_upload';
        $this->addJs('js/jquery.fileupload.js');

    }

}