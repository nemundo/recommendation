<?php

namespace Nemundo\Com\FormBuilder\Item;

use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Core\Type\DateTime\Time;
use Nemundo\Html\Form\Input\InputType;
use Nemundo\Html\Form\Input\TextInput;
use Nemundo\Html\Form\Input\TimeInput;

class AbstractTimeTextBox extends AbstractFormBuilderItem
{

    /**
     * @var bool
     */
    public $readOnly;

    /**
     * @var bool
     */
    public $disabled = false;

    /**
     * @var TimeInput
     */
    protected $textInput;

    /**
     * @var InputType
     */
    //public $inputType = InputType::TEXT;


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->textInput = new TimeInput();// new TextInput();

    }

    protected function prepareHtml()
    {

        $this->textInput->name = $this->name;
        $this->textInput->id = $this->name;
        /*$this->textInput->placeholder = $this->placeholder;
        $this->textInput->size = $this->size;
        $this->textInput->maxLength = $this->maxLength;
        $this->textInput->readOnly = $this->readOnly;
        $this->textInput->disabled = $this->disabled;
        $this->textInput->autofocus = $this->autofocus;
        $this->textInput->required = $this->required;
        $this->textInput->inputType = $this->inputType;*/

        if ($this->searchMode) {
            $this->value = $this->getValue();
        }

        $this->textInput->value = $this->value;
        //$this->textInput->list = $this->datalist;

    }



   // public function getTimeValue()
    public function getTime()
    {

        $time = null;
        if ($this->hasValue()) {
            $time = new Time($this->getValue());
        } else {
            // 00:00
        }

        return $time;

    }




    public function getValue()
    {

        $value = $this->getInternalValue();
        return $value;

    }





}
