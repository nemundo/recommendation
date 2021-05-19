<?php

namespace Nemundo\Package\BootstrapMultiselect\Package;


use Nemundo\Com\Package\AbstractPackage;

class BootstrapMultiselectPackage extends AbstractPackage
{

    protected function loadPackage()
    {

        $this->packageName = 'bootstrap_multiselect';

        $this->addCss('css/bootstrap-multiselect.css');
        $this->addJs('js/bootstrap-multiselect.js');


    }

}