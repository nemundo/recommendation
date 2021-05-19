<?php

namespace Nemundo\Package\Bootstrap\Carousel\Control;


class BootstrapCarouselPreviousControl extends AbstractBootstrapCarouselControlContainer
{

    public function getContent()
    {

        $this->controlName = 'prev';
        return parent::getContent();

    }

}