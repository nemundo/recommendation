<?php

namespace Nemundo\Core\Type;


class Color  // extends AbstractType
{

    /**
     * @var int
     */
    public $r;

    /**
     * @var int
     */
    public $g;

    /**
     * @var int
     */
    public $b;


    public function getHexCode()
    {
        $hex = sprintf('#%02x%02x%02x', $this->r, $this->g, $this->b);
        return $hex;
    }


    public function getRgb()
    {

    }

    /*
    public function getValue()
    {
        return $this->getHexCode();
    }*/


}