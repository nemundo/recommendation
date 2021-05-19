<?php

namespace Nemundo\Html\Button;


use Nemundo\Html\Container\AbstractContentContainer;


abstract class AbstractButton extends AbstractContentContainer
{

    /**
     * @var bool
     */
    public $disabled = false;

    public function getContent()
    {

        $this->tagName = 'button';

        if ($this->disabled) {
            $this->addAttributeWithoutValue('disabled');
        }

        return parent::getContent();

    }

}
