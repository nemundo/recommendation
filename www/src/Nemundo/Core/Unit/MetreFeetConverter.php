<?php

namespace Nemundo\Core\Unit;


class MetreFeetConverter
{

    const FEET = 0.3048;

    public function getMetreFromFeet($feet)
    {
        $metre = $feet * 0.3048;
        return $metre;
    }


    public function getFeetFromMetre($metre)
    {
        $feet = $metre / 0.3048;
        return $feet;
    }


}