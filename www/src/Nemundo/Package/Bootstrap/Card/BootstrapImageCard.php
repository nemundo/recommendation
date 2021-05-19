<?php

namespace Nemundo\Package\Bootstrap\Card;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Heading\H4;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class BootstrapImageCard extends AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $imageUrl;

    /**
     * @var string
     */
    public $imageDescription;

    public function getContent()
    {

        $this->tagName = 'div';
        $this->addCssClass('card');

        $image = new BootstrapResponsiveImage($this);
        $image->addCssClass('card-img-top');
        $image->src = $this->imageUrl;

        $div = new Div($this);
        $div->addCssClass('card-block');

        $p = new H4($div);
        $p->addCssClass('card-block');
        $p->content = $this->imageDescription;

        return parent::getContent();
    }

}