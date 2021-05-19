<?php

namespace Nemundo\Package\BootstrapSelect;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;


// https://developer.snapappointments.com/bootstrap-select/

class BootstrapSelectListBox extends BootstrapListBox
{

    use LibraryTrait;

    /**
     * @var int
     */
    public $width = 300;


    protected function loadContainer()
    {
        parent::loadContainer();
        $this->multiSelect = true;
    }


    public function getContent()
    {

        $this->addPackage(new BootstrapSelectPackage());

        if ($this->width !== null) {
            $this->addAttribute('style', 'width:' . $this->width . 'px');
        }

        $this->addJqueryScript('$("#' . $this->name . '").selectpicker({');
        $this->addJqueryScript('title: "Keine Auswahl",');
        $this->addJqueryScript('actionsBox: true,');
        $this->addJqueryScript('selectAllText: "Alle auswählen",');
        $this->addJqueryScript('deselectAllText: "Zurücksetzen",');
        $this->addJqueryScript('});');

        return parent::getContent();

    }

}