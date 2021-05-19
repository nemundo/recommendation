<?php

namespace Nemundo\Package\Jquery\Script;


use Nemundo\Com\Package\PackageTrait;
use Nemundo\Html\Script\JavaScript;
use Nemundo\Package\Jquery\Package\JqueryPackage;

// Jqueryready
class JqueryScript extends JavaScript
{

    use PackageTrait;


    protected function loadContainer()
    {
        parent::loadContainer();

        $this->addCodeLine('$(document).ready(function () {');



    }


    public function getContent()
    {

        $this->addPackage(new JqueryPackage());


       // '$(document).ready(function () {';

        $this->addCodeLine('});');

        return parent::getContent();
    }


    /*
    if (sizeof($this->jqueryScript) > 0) {
    $code[] =
    $code = array_merge($code, $this->jqueryScript);
    $code[] = '});';
    }*/


}