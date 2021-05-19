<?php

namespace Nemundo\Package\Bootstrap\Button;


use Nemundo\Html\Hyperlink\Hyperlink;

class BootstrapButton extends Hyperlink
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

    public function getContent()
    {

        $this->addAttribute('role', 'button');

        $this->addCssClass('btn');
        $this->addCssClass('mb-2');
        $this->addCssClass($this->color);

        if ($this->size !== null) {
            $this->addCssClass($this->size);
        }

        if ($this->disabled) {
            $this->addCssClass('disabled');
        }

        return parent::getContent();

    }

}