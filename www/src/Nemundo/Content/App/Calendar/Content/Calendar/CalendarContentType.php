<?php

namespace Nemundo\Content\App\Calendar\Content\Calendar;

use Nemundo\Content\App\Calendar\Content\Calendar\Form\CalendarDateContentForm;
use Nemundo\Content\App\Calendar\Content\Calendar\Form\CalendarDateTimeContentForm;
use Nemundo\Content\App\Calendar\Data\Calendar\Calendar;
use Nemundo\Content\App\Calendar\Data\Calendar\CalendarDelete;
use Nemundo\Content\App\Calendar\Data\Calendar\CalendarReader;
use Nemundo\Content\App\Calendar\Data\Calendar\CalendarRow;
use Nemundo\Content\App\Calendar\Data\Calendar\CalendarUpdate;
use Nemundo\Content\App\Calendar\Parameter\CalendarParameter;
use Nemundo\Content\App\Calendar\Site\CalendarSite;
use Nemundo\Content\App\Timeline\Index\TimelineIndexTrait;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractSearchContentType;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Core\Type\DateTime\Time;

class CalendarContentType extends AbstractSearchContentType
{

    use TimelineIndexTrait;

    /**
     * @var Date
     */
    public $date;

    /**
     * @var Time
     */
    public $time;

    public $event;


    protected function loadContentType()
    {

        $this->typeLabel = 'Calendar';
        $this->typeId = '566bf75c-b120-4f3c-8fc4-2b0198e73b12';
        $this->formClassList[] = CalendarDateContentForm::class;
        $this->formClassList[] = CalendarDateTimeContentForm::class;
        $this->formClassList[] = ContentSearchForm::class;
        $this->viewClassList[] = CalendarContentView::class;
        $this->viewSite = CalendarSite::$site;
        $this->parameterClass = CalendarParameter::class;

    }


    protected function onCreate()
    {

        $data = new Calendar();
        $data->date = $this->date;

        if ($this->time !== null) {
            $data->time = $this->time;
        }

        $data->event = $this->event;
        $this->dataId = $data->save();


    }

    protected function onUpdate()
    {

        $update = new CalendarUpdate();
        $update->date = $this->date;
        $update->event = $this->event;
        $update->updateById($this->dataId);

    }


    protected function onDelete()
    {

        $this->deleteTimeline();
        (new CalendarDelete())->deleteById($this->dataId);

    }


    protected function onIndex()
    {

        $calendarRow = $this->getDataRow();
        $this->addSearchWord($calendarRow->event);

        $this->saveTimeline();

    }


    protected function onDataRow()
    {
        $this->dataRow = (new CalendarReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|CalendarRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {

        $calendarRow = $this->getDataRow();
        $subject = $calendarRow->date->getShortDateLeadingZeroFormat() . ' ' . $calendarRow->event;
        return $subject;
        //return $this->getDataRow()->event;
    }


    public function getDate()
    {
        return $this->getDataRow()->date;
    }


    public function getDateTime()
    {

        $dateTime = (new DateTime())->fromDate($this->getDataRow()->date);

        return $dateTime;
    }


}