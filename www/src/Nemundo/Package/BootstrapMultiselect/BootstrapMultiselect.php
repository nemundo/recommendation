<?php

namespace Nemundo\Package\BootstrapMultiselect;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Form\Select\Select;
use Nemundo\Package\BootstrapMultiselect\Package\BootstrapMultiselectPackage;


// https://github.com/davidstutz/bootstrap-multiselect

class BootstrapMultiselect extends Select
{

    use LibraryTrait;

    public function getContent()
    {

        $this->checkProperty('name');

        $this->addPackage(new BootstrapMultiselectPackage());
        $this->multiple = true;
        $this->id = $this->name;

        $this->addJqueryScript('$("#' . $this->id . '").multiselect();');

        return parent::getContent();

    }

}