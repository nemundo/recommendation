<?php

namespace Nemundo\Com\FormBuilder\Item;


use Nemundo\Html\Form\Input\CheckBoxInput;


abstract class AbstractCheckBox extends AbstractFormBuilderItem
{

    /**
     * @var bool
     */
    public $submitOnChange = false;

    /**
     * @var bool
     */
    public $value = false;


    /**
     * @var CheckBoxInput
     */
    protected $checkbox;

    /**
     * @var string
     */
    private $checkedValue = '1';

    public function __construct($parentContainer = null)
    {
        parent::__construct($parentContainer);
        $this->checkbox = new CheckBoxInput();
        $this->checkbox->value =$this->checkedValue;

    }


    protected function prepareHtml()
    {

        if ($this->searchMode) {
            $this->value = $this->getValue();
        }

        $this->checkbox->name = $this->name;
        $this->checkbox->id = $this->name;
        $this->checkbox->checked = $this->value;

        if ($this->inputId !== null) {
            $this->checkbox->id = $this->inputId;
        }

        if ($this->submitOnChange) {
            $this->checkbox->addAttribute('onchange', 'this.form.submit()');
        }


    }


    public function getValue()
    {

        //$parameter = new GetParameter();
        //$parameter->parameterName = $this->name;

        $value = false;
        //if ($parameter->getValue() == $this->checkedValue) {
            if ($this->getInternalValue() == $this->checkedValue) {
            $value=true;
        }

        return $value;

    }

}

