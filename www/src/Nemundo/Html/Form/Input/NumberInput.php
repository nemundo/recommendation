<?php

namespace Nemundo\Html\Form\Input;


class NumberInput extends AbstractInput
{

    /**
     * @var int
     */
    public $min;

    /**
     * @var int
     */
    public $max;

    /**
     * @var bool
     */
    public $required = false;

    /**
     * @var bool
     */
    public $readOnly = false;

    /**
     * @var bool
     */
    public $autofocus = false;

    /**
     * @var bool
     */
    public $autocomplete = false;

    /**
     * @var bool
     */
    public $disabled = false;

    public function getContent()
    {

        $this->addAttribute('type', 'number');

        $this->addAttribute('min',$this->min);
        $this->addAttribute('max',$this->max);

        if ($this->readOnly) {
            $this->addAttributeWithoutValue('readonly');
        }

        if (!$this->autocomplete) {
            $this->addAttribute('autocomplete', 'off');
        }

        if ($this->autofocus) {
            $this->addAttributeWithoutValue('autofocus');
        }

        if ($this->disabled) {
            $this->addAttributeWithoutValue('disabled');
        }

        if ($this->required) {
            $this->addAttributeWithoutValue('required');
        }

        return parent::getContent();

    }

}