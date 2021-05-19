<?php

namespace Nemundo\Core\Date\Duration;


use Nemundo\Core\Base\AbstractBase;

class TimeDuration extends AbstractBase
{

    /**
     * @var int
     */
    private $second;

    public function __construct($second)
    {
        $this->second = $second;
    }


    public function getText()
    {


        $day = intval($this->second / 86400);
        $secondMod = $this->second % 86400;

        $hour = intval($secondMod / 3600);
        $secondMod = $secondMod % 3600;

        $minute = intval($secondMod/60);
        $secondMod = $secondMod % 60;

        $second = $secondMod;

        $text = '';
        if ($day > 0) {
            $text .= $day . ' Days ';
        }

        if ($hour > 0) {
            $text .= $hour . ' Hour ';
        }

        if ($minute > 0) {
            $text .= $minute . ' Minute ';
        }

        $text .= $second . ' Second ';

        return $text;

    }

}