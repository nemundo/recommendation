<?php

namespace Nemundo\Com\FormBuilder\Item;

use Nemundo\Html\Form\Input\InputType;
use Nemundo\Html\Form\Input\NumberInput;
use Nemundo\Html\Form\Input\TextInput;

class AbstractNumberBox extends AbstractFormBuilderItem
{

    /**
     * @var int
     */
    public $minValue;

    /**
     * @var int
     */
    public $maxValue;


    /**
     * @var int
     */
    //public $maxLength = 255;

    /**
     * @var int
     */
    //public $size;

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
    //public $datalist;

    /**
     * @var NumberInput
     */
    protected $numberInput;

    /**
     * @var InputType
     */
    //public $inputType = InputType::TEXT;


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->numberInput = new NumberInput();

    }

    protected function prepareHtml()
    {

        $this->numberInput->name = $this->name;
        $this->numberInput->id = $this->name;
        $this->numberInput->min=$this->minValue;
        $this->numberInput->max=$this->maxValue;
        //$this->numberInput->pla strangeInput->step=$this->stepValue;
        /*$this->numberInput->placeholder = $this->placeholder;
        $this->numberInput->size = $this->size;
        $this->numberInput->maxLength = $this->maxLength;
        $this->numberInput->readOnly = $this->readOnly;*/
        $this->numberInput->disabled = $this->disabled;
        $this->numberInput->autofocus = $this->autofocus;
        $this->numberInput->required = $this->required;
        //$this->numberInput->inputType = $this->inputType;

        if ($this->searchMode) {
            $this->value = $this->getValue();
        }

        $this->numberInput->value = $this->value;
        //$this->numberInput->list = $this->datalist;

    }


    public function getValue()
    {

        $value = $this->getInternalValue();
        return $value;

    }

}
