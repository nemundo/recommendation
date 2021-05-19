<?php

namespace Nemundo\Core\Type\DateTime;

use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogMessage;

class Time extends AbstractBaseClass
{

    /**
     * @var \DateTime
     */
    private $time;

    public function __construct($time = null)
    {

        if ($time !== null) {
            try {
                $this->time = new \DateTime($time);
            } catch (\Exception $exception) {
                (new LogMessage())->writeError('Could not parse Time. Value: ' . $time);
            }
        }

    }


    public function getValue()
    {
        return $this->getIsoTime();
    }


    public function addHour($hour)
    {

    }


    public function addMinute($minute)
    {
        $this->time->add(new \DateInterval('PT' . $minute . 'M'));
    }

    public function addSecond($second)
    {

    }


    public function getIsoTime()
    {
        return $this->getFormat('G:i:s');
    }


    public function getTimestamp()
    {

        $timestamp = 0;
        if ($this->time !==null) {
            $timestamp = $this->time->getTimestamp();
        }
        return $timestamp;

    }


    public function getTime()
    {
        return $this->getFormat('G:i');
    }


    public function getTimeLeadingZero()
    {
        return $this->getFormat('H:i');
    }


    public function getTimeWithSecond()
    {
        return $this->getFormat('g:i:s');
    }


    public function getHour()
    {
        return $this->getFormat('G');
    }


    public function getMinute()
    {
        return $this->getFormat('i');
    }


    public function roundToNearestMinuteInterval($minuteInterval = 10)
    {

        // https://ourcodeworld.com/articles/read/756/how-to-round-up-down-to-nearest-10-or-5-minutes-of-datetime-in-php

        /** @var \DateTime $dateTime */
        $dateTime = clone($this->time);

        $dateTime->setTime(
            $dateTime->format('H'),
            round($dateTime->format('i') / $minuteInterval) * $minuteInterval,
            0
        );

        $dateTimeNew = new DateTime($dateTime->format('G:i:s'));

        return $dateTimeNew;

    }


    public function isNull()
    {

        $value = false;
        if ($this->time == null) {
            $value = true;
        }

        return $value;

    }


    private function getFormat($format)
    {
        $result = null;
        if ($this->time !== null) {
            $result = $this->time->format($format);
        }

        return $result;
    }

}