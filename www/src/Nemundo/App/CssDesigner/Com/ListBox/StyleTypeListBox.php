<?php

namespace Nemundo\App\CssDesigner\Com\ListBox;

use Nemundo\App\CssDesigner\Data\StyleType\StyleTypeReader;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class StyleTypeListBox extends BootstrapListBox
{
    public function getContent()
    {

        $this->label = 'Style Type';

        $reader = new StyleTypeReader();
        foreach ($reader->getData() as $row) {
            $this->addItem($row->id, $row->styleType);
        }


        return parent::getContent();
    }
}