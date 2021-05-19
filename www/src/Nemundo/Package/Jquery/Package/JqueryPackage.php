<?php

namespace Nemundo\Package\Jquery\Package;


use Nemundo\Com\Package\AbstractPackage;

class JqueryPackage extends AbstractPackage
{

    protected function loadPackage()
    {

        $this->packageName = 'jquery';
        $this->addJs('jquery.min.js');

    }

}