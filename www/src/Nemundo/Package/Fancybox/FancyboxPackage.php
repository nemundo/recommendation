<?php

namespace Nemundo\Package\Fancybox;


use Nemundo\Com\Package\AbstractPackage;

class FancyboxPackage extends AbstractPackage
{

    protected function loadPackage()
    {
        $this->packageName = 'fancybox';
        $this->addCss('jquery.fancybox.min.css');
        $this->addJs('jquery.fancybox.min.js');
    }

}