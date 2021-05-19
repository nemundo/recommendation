<?php

namespace Nemundo\Com\Style;


use Nemundo\Core\Base\AbstractBase;

class DimensionStyle extends AbstractBase
{

    /**
     * @var int
     */
    public $width;

    /**
     * @var int
     */
    public $height;

    /**
     * @var string
     */
    public $widthUnit = DimensionUnit::PIXEL;

    /**
     * @var string
     */
    public $heightUnit = DimensionUnit::PIXEL;


    public function getStyle()
    {

        $style = 'height: ' . $this->height . $this->heightUnit . ';width: ' . $this->width . $this->widthUnit . ';';
        return $style;

    }

}