<?php

namespace Nemundo\Format\Calendar;


use Nemundo\Core\Http\Response\AbstractHttpResponse;
use Nemundo\Core\Http\Response\ContentType;

class VCalendarResponse extends AbstractHttpResponse
{

    use VCalendarTrait;

    public function sendResponse()
    {

        $icalendar = new VCalendar();
        $icalendar->dateFrom = $this->dateFrom;
        $icalendar->dateTo = $this->dateTo;
        $icalendar->dayEvent = $this->dayEvent;
        $icalendar->label = $this->label;
        $icalendar->description = $this->description;
        $icalendar->location = $this->location;

        $this->content = $icalendar->getContent();
        $this->contentType = ContentType::CALENDAR;

        parent::sendResponse();

    }


}