<?php

namespace Nemundo\Content\App\TimeSeries\Content\Chart;

use Nemundo\Content\App\TimeSeries\Com\ListBox\LineListBox;
use Nemundo\Content\App\TimeSeries\Com\ListBox\PeriodTypeListBox;
use Nemundo\Content\App\TimeSeries\Com\ListBox\TimeSeriesListBox;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFromToDatePicker;

class TimeSeriesChartContentForm extends AbstractContentForm
{
    /**
     * @var TimeSeriesChartContentType
     */
    public $contentType;

    /**
     * @var TimeSeriesListBox
     */
    private $timeSeries;

    /**
     * @var LineListBox
     */
    private $line;

    /**
     * @var PeriodTypeListBox
     */
    private $periodType;

    /**
     * @var BootstrapFromToDatePicker
     */
    private $dateFromTo;

    public function getContent()
    {

        $this->timeSeries = new TimeSeriesListBox($this);
        $this->timeSeries->validation = true;

        $this->line = new LineListBox($this);
        $this->line->validation = true;

        $this->periodType = new PeriodTypeListBox($this);
        $this->periodType->validation = true;

        $this->dateFromTo = new BootstrapFromToDatePicker($this);
        $this->dateFromTo->validation = true;


        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $chartRow = $this->contentType->getDataRow();

        $this->timeSeries->value = $chartRow->timeSeriesId;
        $this->line->value = $chartRow->lineId;
        $this->periodType->value = $chartRow->periodTypeId;

        $this->dateFromTo->setDateFrom($chartRow->dateFrom);
        $this->dateFromTo->setDateTo($chartRow->dateTo);

    }


    public function onSubmit()
    {

        $this->contentType->timeSeriesId = $this->timeSeries->getValue();
        $this->contentType->lineId = $this->line->getValue();
        $this->contentType->periodTypeId = $this->periodType->getValue();
        $this->contentType->dateFrom = $this->dateFromTo->getDateFrom();
        $this->contentType->dateTo = $this->dateFromTo->getDateTo();
        $this->contentType->saveType();

    }
}