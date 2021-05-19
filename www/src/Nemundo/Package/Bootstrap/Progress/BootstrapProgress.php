<?php

namespace Nemundo\Package\Bootstrap\Progress;


use Nemundo\Html\Block\Div;

class BootstrapProgress extends Div
{

    /**
     * @var int
     */
    public $value = 0;

    /**
     * @var int
     */
    public $min = 0;

    /**
     * @var int
     */
    public $max = 100;


    public function getContent()
    {

        $this->addCssClass('progress');

        $div = new Div($this);
        $div->addCssClass('progress-bar');
        $div->addAttribute('role', 'progressbar');
        $div->addAttribute('style', 'width: ' . $this->value . '%');
        $div->addAttribute('aria-valuenow', $this->value);
        $div->addAttribute('aria-valuemin', $this->min);
        $div->addAttribute('aria-valuemax', $this->max);

        return parent::getContent();

    }

}