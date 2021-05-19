<?php

namespace Nemundo\Content\App\ImageTimeline\Content\TimelapseJob;

use Nemundo\Content\App\ImageTimeline\Com\ListBox\ImageTimelineListBox;
use Nemundo\Content\App\ImageTimeline\Data\TimelapseJob\TimelapseJob;
use Nemundo\Content\App\Job\Index\JobIndexBuilder;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFromToDatePicker;
use Nemundo\Package\Bootstrap\FormElement\BootstrapNumberBox;


class TimelapseJobContentForm extends AbstractContentForm
{
    /**
     * @var TimelapseJobContentType
     */
    public $contentType;

    /**
     * @var ImageTimelineListBox
     */
    private $timeline;

    /**
     * @var BootstrapFromToDatePicker
     */
    private $dateFromTo;


    /**
     * @var BootstrapNumberBox
     */
    private $timerate;


    public function getContent()
    {

        $this->timeline = new ImageTimelineListBox($this);
        $this->timeline->validation = true;

        $this->timerate=new BootstrapNumberBox($this);
        $this->timerate->label='Timerate';
        $this->timerate->value=10;

        $this->dateFromTo = new BootstrapFromToDatePicker($this);
        $this->dateFromTo->validation = true;

        return parent::getContent();

    }

    public function onSubmit()
    {

        $data = new TimelapseJob();
        $data->imageTimelineId = $this->timeline->getValue();
        $data->dateTimeFrom->fromDate($this->dateFromTo->getDateFrom());
        $data->dateTimeFrom->setHour(00);
        $data->dateTimeFrom->setMinute(00);
        $data->dateTimeTo->fromDate($this->dateFromTo->getDateTo());
        $data->dateTimeTo->setHour(23);
        $data->dateTimeTo->setMinute(59);
        //$data->done = false;
        $dataId = $data->save();

        $type = new TimelapseJobContentType($dataId);
        (new JobIndexBuilder($type))->buildIndex();

    }
}