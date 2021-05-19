<?php

namespace Nemundo\Core\Time;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Number\Number;


class Second extends AbstractBase
{

    /**
     * @var
     */
    private $second;

    public function __construct($second)
    {
        $this->second = $second;
    }


    public function getHourMinute()
    {

        $hours = floor($this->second / 3600);
        $minutes = floor(($this->second / 60) % 60);
        //$seconds = $seconds % 60;

        $value = $hours . ':' . $minutes;

        //return "$hours:$minutes:$seconds";

        return $value;


    }


    public function getMinuteSecond()
    {

        $minutes = floor(($this->second / 60) % 60);
        $second = $this->second % 60;
        $value = $minutes . ':' .  (new Number( $second))->getFormatWithLeadingZero(2);

        return $value;

    }


    public function getText()
    {

        $value = $this->getMinuteSecond() . ' min';
        return $value;

    }

}