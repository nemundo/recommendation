<?php

namespace Nemundo\Package\Bootstrap\Image;


use Nemundo\Html\Image\Img;

class BootstrapResponsiveImage extends Img
{

    public function loadContainer()
    {
        parent::loadContainer();
        $this->addCssClass('img-fluid');
    }

}