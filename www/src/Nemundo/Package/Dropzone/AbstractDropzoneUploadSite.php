<?php


namespace Nemundo\Package\Dropzone;


use Nemundo\Web\Site\AbstractSite;

abstract class AbstractDropzoneUploadSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->url = 'dropzone-upload';
        $this->menuActive=false;

    }

}