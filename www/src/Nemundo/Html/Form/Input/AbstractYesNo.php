<?php

namespace Nemundo\Html\Form\Input;


abstract class AbstractYesNo extends AbstractInput
{

    /**
     * @var bool
     */
    public $checked = false;

    /**
     * @var InputType
     */
    protected $inputType;


    public function getContent()
    {

        if ($this->checked) {
            $this->addAttributeWithoutValue('checked');
        }

        $this->addAttribute('value', $this->value);

        return parent::getContent();

    }

}

