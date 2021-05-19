<?php


namespace Nemundo\Srf\Package;


use Nemundo\Com\Package\AbstractPackage;
use Nemundo\Srf\SrfProject;

class SrfPackage extends AbstractPackage
{

    protected function loadPackage()
    {
        $this->project = new SrfProject();
        $this->packageName = 'srf';
        $this->addJs('livestream.js');
    }

}