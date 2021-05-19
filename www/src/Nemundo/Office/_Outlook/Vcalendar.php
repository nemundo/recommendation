<?php

namespace Nemundo\Office\Outlook;


use Nemundo\Core\Base\AbstractDocument;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Core\Http\Response\HttpResponse;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Core\Type\DateTime\DateTime;


// https://www.calendarlabs.com/

// iCal
// VCALENDAR
class Vcalendar extends AbstractDocument
{

    /**
     * @var string
     */
    //public $filename = 'calendar.ics';

    /**
     * @var DateTime
     */
    public $dateFrom;

    /**
     * @var DateTime
     */
    public $dateTo;

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $location;

    /**
     * @var bool
     */
    public $dayEvent = false;


    public function saveFile()
    {


        /*
        $file = new TextFile();
        $file->filename = $this->filename;
        $file->content = $this->getContent();
        $file->overwriteExistingFile = true;
        $file->saveFile();*/

    }


    public function render()
    {

        $response = new HttpResponse();
        $response->attachmentFilename = 'calendar.ics';
        $response->content = $this->getContent();
        $response->sendResponse();

        /*
        header('Content-type: text/calendar; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $this->filename . '"');
        http_response_code(200);
        echo $this->getContent();*/

    }


    private function getContent()
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

        if ($this->dayEvent) {
            $data->addValue('DTSTART:' . $this->dateFrom->getFormat('Ymd\THis'));
            //$data->addValue('DTEND:' . $this->dateTo->getFormat('Ymd'));
        } else {
            $data->addValue('DTSTART:' . $this->dateFrom->getFormat('Ymd\THis'));
            $data->addValue('DTEND:' . $this->dateTo->getFormat('Ymd\THis'));
        }


//        DTSTART;VALUE=DATE:20151217
//DTEND;VALUE=DATE:20151218


        //DTSTART;VALUE=DATE:20100101


        //$data->addValue('DTSTAMP:' . date('Ymd') . "T" . date('His'));


        $data->addValue('END:VEVENT');
        $data->addValue('END:VCALENDAR');


        return $data->getText();


    }

}
