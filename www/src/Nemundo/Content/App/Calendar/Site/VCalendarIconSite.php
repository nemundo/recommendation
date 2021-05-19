<?php

namespace Nemundo\Content\App\Calendar\Site;

use Nemundo\Content\App\Calendar\Content\Calendar\CalendarContentType;
use Nemundo\Content\App\Calendar\Data\CalendarIndex\CalendarIndexReader;
use Nemundo\Content\App\Calendar\Parameter\CalendarParameter;
use Nemundo\Format\Calendar\VCalendarResponse;
use Nemundo\Office\Outlook\Vcalendar;
use Nemundo\Package\FontAwesome\IconSite\AbstractCalendarIconSite;
use Nemundo\Web\Site\AbstractSite;

class VCalendarIconSite extends AbstractCalendarIconSite
{

    /**
     * @var VCalendarIconSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Vcalendar';
        $this->url = 'vcalendar';
        VCalendarIconSite::$site=$this;
    }

    public function loadContent()
    {

        $calendarParameter=new CalendarParameter();
        $calendarRow = (new CalendarContentType($calendarParameter->getValue()))->getDataRow();

        //$calendarRow = (new CalendarIndexReader())->getRowById($calendarParameter->getValue());

        $card=new VCalendarResponse();
        $card->dateFrom = $calendarRow->date;
        $card->dateTo = $calendarRow->date;
        $card->label=$calendarRow->title;
        $card->sendResponse();


    }
}