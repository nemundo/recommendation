<?php

namespace Nemundo\Content\App\Calendar\Content\Calendar\Form;

use Nemundo\Content\App\Calendar\Content\Calendar\CalendarContentType;
use Nemundo\Content\App\Calendar\Data\Calendar\CalendarModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapDatePicker;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTimeTextBox;

class CalendarDateTimeContentForm extends AbstractContentForm
{
    /**
     * @var CalendarContentType
     */
    public $contentType;

    /**
     * @var BootstrapDatePicker
     */
    private $date;

    /**
     * @var BootstrapTimeTextBox
     */
    private $time;

    /**
     * @var BootstrapTextBox
     */
    private $event;

    public $formName = 'Date/Time';

    public function getContent()
    {

        $model = new CalendarModel();

        $this->date = new BootstrapDatePicker($this);
        $this->date->label = $model->date->label;
        $this->date->validation = true;

        $this->time=new BootstrapTimeTextBox($this);
        $this->time->label = $model->time->label;
        $this->time->validation = true;

        $this->event = new BootstrapTextBox($this);
        $this->event->label = $model->event->label;
        $this->event->validation = true;

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $calendarRow = $this->contentType->getDataRow();

        $this->date->value = $calendarRow->date->getShortDateLeadingZeroFormat();
        $this->event->value = $calendarRow->event;

    }


    public function onSubmit()
    {

        $this->contentType->date = $this->date->getDateValue();
        $this->contentType->time=$this->time->getTime();  //getValue()
        $this->contentType->event = $this->event->getValue();
        $this->contentType->saveType();

    }
}