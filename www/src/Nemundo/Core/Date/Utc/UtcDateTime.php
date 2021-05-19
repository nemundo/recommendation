<?php

namespace Nemundo\Core\Date\Utc;


use Nemundo\Core\Date\Timezone\Timezone;
use Nemundo\Core\Type\DateTime\DateTime;

class UtcDateTime extends DateTime
{


    public function __construct($date = null)
    {

        $this->timezone = Timezone::UTC;
        parent::__construct($date);

    }


    public function getLocalDateTime($timezone)
    {

        $dateTime = new DateTime($this->getIsoDate());
        $dateTime->setTimezone($timezone);

        return $dateTime;

    }

}