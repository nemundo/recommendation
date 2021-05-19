<?php

namespace Nemundo\Content\App\TimeSeries\Content\TimeSeries;

use Nemundo\Com\Chart\Data\LineChartData;
use Nemundo\Content\App\TimeSeries\Com\Chart\TimeSeriesChart;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesData\TimeSeriesDataReader;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\DayPeriodType;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Echarts\Chart\Echart;

class TimeSeriesContentView extends AbstractContentView
{
    /**
     * @var TimeSeriesContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='c40d4383-cc73-445b-a5b4-c145ad93082b';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $chart=new TimeSeriesChart($this);
        $chart->timeSeriesId=$this->contentType->getDataId();
        $chart->periodType= new DayPeriodType();


        /*$chart=new Echart($this);

        $line=new LineChartData($chart);

        $reader=new TimeSeriesDataReader();
        $reader->model->loadPeriod();
        $reader->filter->andEqual($reader->model->lineId,$this->contentType->getDataId());
        //$reader->addOrder($reader->model->timePeriod->year);
        //$reader->addOrder($reader->model->timePeriod->date);

        foreach ($reader->getData() as $dataRow) {
            $line->addValue($dataRow->value);
            $chart->addXAxisLabel($dataRow->timePeriod->date->getIsoDateFormat());
        }*/

        return parent::getContent();
    }
}