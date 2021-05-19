<?php

namespace Nemundo\Html\Form\Select;


class Option extends AbstractOptgroupOption
{

    /**
     * @var string
     */
    public $value;

    /**
     * @var bool
     */
    public $selected = false;


    public function getContent()
    {

        $this->tagName = 'option';
        $this->returnOneLine = true;
        $this->addAttribute('value', $this->value);

        if ($this->selected) {
            $this->addAttributeWithoutValue('selected');
        }

        $this->addContent($this->label);

        return parent::getContent();

    }

}