<?php

namespace Nemundo\Com\FormBuilder\Item;

use Nemundo\Html\Form\Input\InputType;
use Nemundo\Html\Form\Input\NumberInput;
use Nemundo\Html\Form\Input\RangeInput;
use Nemundo\Html\Form\Input\TextInput;

class AbstractRangeBox extends AbstractFormBuilderItem
{

    public $minValue;

    public $maxValue;

    public $stepValue;

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
   // public $datalist;

    /**
     * @var RangeInput
     */
    protected $rangeInput;

    /**
     * @var InputType
     */
    //public $inputType = InputType::TEXT;


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->rangeInput = new RangeInput();

    }

    protected function prepareHtml()
    {

        $this->rangeInput->name = $this->name;
        $this->rangeInput->id = $this->name;
        $this->rangeInput->min=$this->minValue;
        $this->rangeInput->max=$this->maxValue;
        $this->rangeInput->step=$this->stepValue;

        /*$this->numberInput->placeholder = $this->placeholder;
        $this->numberInput->size = $this->size;
        $this->numberInput->maxLength = $this->maxLength;
        $this->numberInput->readOnly = $this->readOnly;*/
       /* $this->rangeInput->disabled = $this->disabled;
        $this->rangeInput->autofocus = $this->autofocus;
        $this->rangeInput->required = $this->required;*/
        //$this->numberInput->inputType = $this->inputType;

        if ($this->searchMode) {
            $this->value = $this->getValue();
        }

        $this->rangeInput->value = $this->value;
        //$this->numberInput->list = $this->datalist;

    }


    public function getValue()
    {

        $value = $this->getInternalValue();
        return $value;

    }

}
