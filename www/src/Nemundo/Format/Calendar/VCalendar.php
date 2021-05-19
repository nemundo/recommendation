<?php

namespace Nemundo\Format\Calendar;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Core\Random\UniqueId;


class VCalendar extends AbstractBase
{

    use VCalendarTrait;

    public function getContent()
    {

        $data = new TextDirectory();
        $data->addValue('BEGIN:VCALENDAR');
        $data->addValue('VERSION:2.0');
        $data->addValue('PRODID:');
        $data->addValue('METHOD:PUBLISH');
        $data->addValue('BEGIN:VEVENT');
        $data->addValue('UID:' . (new UniqueId())->getUniqueId());
        //$data->addValue('X-MICROSOFT-CDO-BUSYSTATUS:OOF');
        $data->addValue('SUMMARY:' . $this->label);
        $data->addValue('DESCRIPTION:' . $this->description);
        $data->addValue('LOCATION:' . $this->location);
        $data->addValue('CLASS:PUBLIC');

        //$data->addValue('DTSTART:' . date("Ymd\THis", strtotime($this->dateFrom)));
        //$data->addValue('DTEND:' . date("Ymd\THis", strtotime($this->dateTo));
        //$data->addValue('DTSTAMP:' . date('Ymd') . "T" . date('His'));

        //$format = 'Ymd\THis';
        //$data->addValue('DTSTART:' . $this->dateFrom->getFormat($format));
        //$data->addValue('DTEND:' . $this->dateTo->getFormat($format));

        //$format = 'Ymd';
        //$data->addValue('DTSTART;VALUE=DATE:' . $this->dateFrom->getIsoDateTimeFormat());
        //$data->addValue('DTEND;VALUE=DATE:' . $this->dateTo->getIsoDateTimeFormat());

        /*
         * DTEND;VALUE=DATE:20190817
DTSTAMP:20190730T083100Z
DTSTART;VALUE=DATE:20190812
         */


        if ($this->dayEvent) {

            // plus ein Tag

            $dateFrom = clone($this->dateFrom);

            $dateTo = clone($this->dateTo);
            if ($dateTo == null) {
                $dateTo = clone($dateFrom);
            } else {
                $dateTo = clone($this->dateTo);
            }

            $dateTo->addDay(1);

            $data->addValue('DTSTART;VALUE=DATE:' . $dateFrom->getFormat('Ymd'));
            $data->addValue('DTEND;VALUE=DATE:' . $dateTo->getFormat('Ymd'));

        } else {

            $data->addValue('DTSTART:' . $this->dateFrom->getFormat('Ymd\THis'));
            $data->addValue('DTEND:' . $this->dateTo->getFormat('Ymd\THis'));

        }

        $data->addValue('END:VEVENT');
        $data->addValue('END:VCALENDAR');


        return $data->getText();


    }

}
