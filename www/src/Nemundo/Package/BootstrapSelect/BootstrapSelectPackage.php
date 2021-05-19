<?php

namespace Nemundo\Package\BootstrapSelect;


use Nemundo\Com\Package\AbstractPackage;

class BootstrapSelectPackage extends AbstractPackage
{

    protected function loadPackage()
    {

        $this->packageName = 'bootstrap_select';

        $this->addCss('css/bootstrap-select.min.css');
        $this->addJs('js/bootstrap-select.min.js');

    }

}