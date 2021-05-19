<?php

namespace Nemundo\Package\Bootstrap\Package;


use Nemundo\Com\Package\AbstractPackage;

class BootstrapPackage extends AbstractPackage
{

    protected function loadPackage()
    {

        $this->packageName = 'bootstrap';

        $this->addCss('css/bootstrap.css');
        //$this->addJs('js/bootstrap.js');
        $this->addJs('js/bootstrap.bundle.min.js');

    }

}