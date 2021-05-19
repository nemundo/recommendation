<?php


namespace Nemundo\Package\NemundoJs;


use Nemundo\Com\Package\AbstractPackage;

class NemundoJsPackage extends AbstractPackage
{

    protected function loadPackage()
    {

        $this->packageName = 'nemundo_js';
        $this->addJs('nemundo.js');

    }

}