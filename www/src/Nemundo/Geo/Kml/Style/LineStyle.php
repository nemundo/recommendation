<?php

namespace Nemundo\Geo\Kml\Style;


use Nemundo\Geo\Kml\Property\Color;
use Nemundo\Geo\Kml\Property\Width;
use Nemundo\Html\Container\AbstractTagContainer;

class LineStyle extends AbstractTagContainer
{

    /**
     * @var string
     */
    public $color;

    /**
     * @var int
     */
    public $width;


    public function getContent()
    {

        $this->tagName = 'LineStyle';

        if ($this->width !== null) {
            $tag = new Width($this);
            $tag->addContent($this->width);
        }

        if ($this->color !== null) {
            $tag = new Color($this);
            $tag->addContent($this->color);
        }

        return parent::getContent();

    }

}