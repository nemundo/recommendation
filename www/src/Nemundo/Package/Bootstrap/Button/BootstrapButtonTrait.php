<?php

namespace Nemundo\Package\Bootstrap\Button;


trait BootstrapButtonTrait
{

    /**
     * @var BootstrapButtonColor
     */
    public $color = BootstrapButtonColor::PRIMARY;

    /**
     * @var BootstrapButtonSize
     */
    public $size;

    /**
     * @var bool
     */
    public $disabled = false;


    protected function loadButton()
    {

        $this->addAttribute('role', 'button');
        $this->addCssClass('btn');
        $this->addCssClass($this->color);

        if ($this->size !== null) {
            $this->addCssClass($this->size);
        }

        if ($this->disabled) {
            $this->addCssClass('disabled');
        }

    }


}