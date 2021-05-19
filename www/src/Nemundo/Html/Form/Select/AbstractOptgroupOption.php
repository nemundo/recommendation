<?php

namespace Nemundo\Html\Form\Select;


use Nemundo\Html\Container\AbstractHtmlContainer;

abstract class AbstractOptgroupOption extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $label;

    /**
     * @var bool
     */
    public $disabled = false;


    public function getContent()
    {

        if ($this->disabled) {
            $this->addAttributeWithoutValue('disabled');
        }

        return parent::getContent();

    }

}