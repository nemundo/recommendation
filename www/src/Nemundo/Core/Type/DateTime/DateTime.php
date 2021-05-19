<?php

namespace Nemundo\Core\Type\DateTime;


class DateTime extends Date
{

    public function fromDate(Date $date)
    {

        $this->setValue($date->getIsoDate());
        return $this;

    }

    public function setTimezone($timezone)
    {
        $this->date->setTimezone((new \DateTimeZone($timezone)));
        return $this;
    }


    public function setTime(Time $time)
    {
        $this->setHour($time->getHour());
        $this->setMinute($time->getMinute());
        return $this;
    }


    public function setHour($hour)
    {
        $this->setDefault();
        $this->date->setTime($hour, $this->getMinute());
        return $this;
    }


    public function setMinute($minute)
    {

        $this->setDefault();
        $this->date->setTime($this->getHour(), $minute);
        return $this;
    }


    public function setSecond($second)
    {
        $this->setDefault();
        $this->date->setTime($this->getHour(), $this->getMinute(), $second);
        return $this;
    }


    public function getHour()
    {
        $hour = $this->getFormat('G');
        return $hour;
    }


    public function getHourWithLeadingZero()
    {
        $hour = $this->getFormat('H');
        return $hour;
    }


    public function getMinute()
    {
        $minute = $this->getFormat('i');
        return $minute;
    }


    public function getMinuteWithLeadingZero()
    {
        $hour = $this->getFormat('i');
        return $hour;
    }


    public function resetTime()
    {

        $this->setHour(0);
        $this->setMinute(0);
        $this->setSecond(0);
        return $this;

    }


    public function getDate()
    {

        $date = new Date($this->getIsoDate());
        return $date;

    }


    public function getTime()
    {

        $time = new Time($this->getIsoTime());
        return $time;

    }


    public function getIsoDateTime()
    {
        return $this->getFormat('Y-m-d H:i:s');
    }


    public function getIsoTime()
    {
        return $this->getFormat('G:i');
    }


    public function getIsoTimePrefixZero()
    {
        return $this->getFormat('H:i');
    }



    public function getIsoTimeWithSecond()
    {
        return $this->getFormat('G:i:s');
    }


    public function getTimeLeadingZero()
    {
        return $this->getFormat('H:i');
    }


    public function getLongFormat()
    {
        return $this->getFormat('j. F Y G:i');
    }


    public function getShortDateTimeFormat()
    {
        return $this->getFormat('j.n.Y G:i');
    }


    public function getShortDateTimeLeadingZeroFormat()
    {
        return $this->getFormat('d.m.Y H:i');
    }


    public function getShortDateTimeWithSecondLeadingZeroFormat()
    {
        return $this->getFormat('d.m.Y H:i:s');
    }


    public function getShortDateTimeWithSecondMillisecondLeadingZeroFormat()
    {
        return $this->getFormat('d.m.Y H:i:s.u');
    }


    // auslagern in eigenständige Class !!!
    public function roundToNearestMinuteInterval($minuteInterval = 10)
    {

        // https://ourcodeworld.com/articles/read/756/how-to-round-up-down-to-nearest-10-or-5-minutes-of-datetime-in-php

        /** @var \DateTime $dateTime */
        $dateTime = clone($this->date);

        $dateTime->setTime(
            $dateTime->format('H'),
            round($dateTime->format('i') / $minuteInterval) * $minuteInterval,
            0
        );

        $dateTimeNew = new DateTime($dateTime->format('Y-m-d G:i:s'));

        return $dateTimeNew;

    }


}