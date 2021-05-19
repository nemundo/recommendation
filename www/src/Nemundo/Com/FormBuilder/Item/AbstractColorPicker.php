<?php

namespace Nemundo\Com\FormBuilder\Item;

use Nemundo\Html\Form\Input\ColorInput;
use Nemundo\Html\Form\Input\InputType;
use Nemundo\Html\Form\Input\TextInput;

class AbstractColorPicker extends AbstractFormBuilderItem
{

    /**
     * @var ColorInput
     */
    protected $colorInput;


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->colorInput = new ColorInput();

    }

    protected function prepareHtml()
    {

        $this->colorInput->name = $this->name;
        $this->colorInput->id = $this->name;
        /*$this->colorInput->placeholder = $this->placeholder;
        $this->colorInput->size = $this->size;
        $this->colorInput->maxLength = $this->maxLength;
        $this->colorInput->readOnly = $this->readOnly;
        $this->colorInput->disabled = $this->disabled;
        $this->colorInput->autofocus = $this->autofocus;
        $this->colorInput->required = $this->required;
        $this->colorInput->inputType = $this->inputType;*/

        if ($this->searchMode) {
            $this->value = $this->getValue();
        }

        $this->colorInput->value = $this->value;
        //$this->colorInput->list = $this->datalist;

    }


    public function getValue()
    {

        $value = $this->getInternalValue();
        return $value;

    }

}
