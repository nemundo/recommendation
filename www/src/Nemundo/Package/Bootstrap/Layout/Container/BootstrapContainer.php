<?php

namespace Nemundo\Package\Bootstrap\Layout\Container;


use Nemundo\Html\Block\Div;

class BootstrapContainer extends Div
{

    /**
     * @var bool
     */
    public $fullWidth = false;


    public function getContent()
    {

        if ($this->fullWidth) {
            $this->addCssClass('container-fluid');
        } else {
            $this->addCssClass('container');
        }

        return parent::getContent();

    }

}
