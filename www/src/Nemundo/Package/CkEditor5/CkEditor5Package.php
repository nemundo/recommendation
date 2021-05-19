<?php

namespace Nemundo\Package\CkEditor5;


use Nemundo\Com\Package\AbstractPackage;

class CkEditor5Package extends AbstractPackage
{

    protected function loadPackage()
    {

        $this->packageName = 'ckeditor5';
        $this->addJs('ckeditor.js');

    }

}