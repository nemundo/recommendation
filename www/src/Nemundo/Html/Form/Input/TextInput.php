<?php

namespace Nemundo\Html\Form\Input;


use Nemundo\Core\Language\Translation;

class TextInput extends AbstractInput
{

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

    /**
     * @var mixed
     */
    public $size;

    /**
     * @var mixed
     */
    public $maxLength;

    /**
     * @var string
     */
    public $placeholder;

    /**
     * @var string
     */
    public $list;

    /**
     * @var InputType
     */
    public $inputType = InputType::TEXT;


    public function getContent()
    {

        $this->addAttribute('type', $this->inputType);
        $this->addAttribute('placeholder', (new Translation())->getText($this->placeholder));
        $this->addAttribute('size', $this->size);
        $this->addAttribute('maxlength', $this->maxLength);
        $this->addAttribute('list', $this->list);

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