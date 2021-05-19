<?php

namespace Nemundo\App\Scheduler\Check;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Directory\TextDirectory;

class RepeatingTime extends AbstractBase
{

    /**
     * @var int
     */
    public $day = 0;

    /**
     * @var int
     */
    public $hour = 0;

    /**
     * @var int
     */
    public $minute = 0;


    public function getMinute()
    {


        $repeatingMinute = ($this->day * 24 * 60) + ($this->hour * 60) + $this->minute;
        return $repeatingMinute;

    }


    public function getText()
    {

        $text = new TextDirectory();
        if ($this->minute != 0) {
            $text->addValue($this->minute . ' Minute');
        }

        if ($this->hour != 0) {
            $text->addValue($this->hour . ' Hour');
        }

        if ($this->day != 0) {
            $text->addValue($this->day . ' Day');
        }


        $value = $text->getTextWithSeperator();
        if ($text->isEmpty()) {
            $value = 'No Repeating Time Defintion';
        }

        return $value;

    }

}