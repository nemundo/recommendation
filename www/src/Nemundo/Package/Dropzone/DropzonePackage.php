<?php


namespace Nemundo\Package\Dropzone;


use Nemundo\Com\Package\AbstractPackage;

class DropzonePackage extends AbstractPackage
{

    protected function loadPackage()
    {

        $this->packageName = 'dropzone';
        $this->addJs('dropzone.min.js');
        $this->addCss('dropzone.min.css');

    }

}