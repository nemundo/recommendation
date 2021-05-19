<?php

namespace Nemundo\Com\FormBuilder\Item;

use Nemundo\Html\Form\Input\InputType;
use Nemundo\Html\Form\Input\TextInput;

class AbstractTextBox extends AbstractFormBuilderItem
{

    /**
     * @var int
     */
    public $maxLength = 255;

    /**
     * @var int
     */
    public $size;

    /**
     * @var string|string[]
     */
    public $placeholder;

    /**
     * @var bool
     */
    public $readOnly;

    /**
     * @var bool
     */
    public $disabled = false;

    /**
     * @var string
     */
    public $datalist;

    /**
     * @var TextInput
     */
    protected $textInput;

    /**
     * @var InputType
     */
    public $inputType = InputType::TEXT;


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->textInput = new TextInput();

    }

    protected function prepareHtml()
    {

        $this->textInput->name = $this->name;
        $this->textInput->id = $this->name;
        $this->textInput->placeholder = $this->placeholder;
        $this->textInput->size = $this->size;
        $this->textInput->maxLength = $this->maxLength;
        $this->textInput->readOnly = $this->readOnly;
        $this->textInput->disabled = $this->disabled;
        $this->textInput->autofocus = $this->autofocus;
        $this->textInput->required = $this->required;
        $this->textInput->inputType = $this->inputType;

        if ($this->searchMode) {
            $this->value = $this->getValue();
        }

        $this->textInput->value = $this->value;
        $this->textInput->list = $this->datalist;

    }


    public function getValue()
    {

        $value = $this->getInternalValue();
        return $value;

    }

}
