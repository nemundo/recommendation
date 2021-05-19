<?php

namespace Nemundo\Package\Bootstrap\Image;


use Nemundo\Html\Image\Img;

class ThumbnailImage extends Img
{

    public function getContent()
    {
        $this->addCssClass('img-thumbnail');
        return parent::getContent();
    }

}