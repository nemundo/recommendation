<?php

namespace Nemundo\Html\Form\Input;


use Nemundo\Html\Form\AbstractFormItem;

abstract class AbstractInput extends AbstractFormItem
{

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $value;


    public function getContent()
    {

        $this->tagName = 'input';
        $this->renderClosingTag = false;
        $this->addAttribute('value', htmlspecialchars($this->value));

        return parent::getContent();

    }

}
