<?php

namespace Nemundo\Html\Form\Input;


class RangeInput extends AbstractInput
{

    /**
     * @var int
     */
    public $min = 0;

    /**
     * @var int
     */
    public $max = 10;

    /**
     * @var int
     */
    public $step;

    public function getContent()
    {

        $this->addAttribute('type', 'range');
        $this->addAttribute('min', $this->min);
        $this->addAttribute('max', $this->max);
        $this->addAttribute('step', $this->step);

        return parent::getContent();

    }

}