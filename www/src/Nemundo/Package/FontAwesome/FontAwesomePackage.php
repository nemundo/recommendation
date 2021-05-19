<?php

namespace Nemundo\Package\FontAwesome;


use Nemundo\Com\Package\AbstractPackage;

class FontAwesomePackage extends AbstractPackage
{

    protected function loadPackage()
    {

        $this->packageName = 'fontawesome';
        $this->addCss('css/all.css');

    }

}