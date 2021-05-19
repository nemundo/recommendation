<?php

namespace Nemundo\Package\Bootstrap\Carousel\Control;


class BootstrapCarouselNextControl extends AbstractBootstrapCarouselControlContainer
{

    public function getContent()
    {

        $this->controlName = 'next';
        return parent::getContent();

    }

}