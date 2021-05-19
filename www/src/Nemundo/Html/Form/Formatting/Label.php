<?php

namespace Nemundo\Html\Form\Formatting;


use Nemundo\Html\Container\AbstractContentContainer;

class Label extends AbstractContentContainer
{

    /**
     * @var string
     */
    public $for;

    public function getContent()
    {

        $this->tagName = 'label';
        $this->addAttribute('for', $this->for);

        return parent::getContent();

    }

}