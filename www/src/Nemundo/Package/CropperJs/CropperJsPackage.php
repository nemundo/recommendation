<?php

namespace Nemundo\Package\CropperJs;


use Nemundo\Com\Package\AbstractPackage;

class CropperJsPackage extends AbstractPackage
{

    protected function loadPackage()
    {

        $this->packageName = 'cropper_js';
        $this->addJs('cropper.js');
        $this->addCss('cropper.css');


    }

}