<?php

namespace Nemundo\Package\Bootstrap\Carousel;

use Nemundo\Html\Block\Div;

class BootstrapCarouselItem extends Div
{

    public function getContent()
    {

        $this->addCssClass('carousel-item');
        return parent::getContent();

    }

}