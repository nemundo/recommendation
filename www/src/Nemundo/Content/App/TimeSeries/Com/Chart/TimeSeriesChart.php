<?php


namespace Nemundo\Content\App\TimeSeries\Com\Chart;


use Nemundo\Com\Chart\Data\LineChartData;
use Nemundo\Content\App\TimeSeries\Data\Line\LineReader;
use Nemundo\Content\App\TimeSeries\Reader\TimeSeriesValueReader;

class TimeSeriesChart extends AbstractTimesSeriesChart
{

    public function getContent()
    {

        $reader = new TimeSeriesValueReader();
        $reader->dateFrom=$this->dateFrom;
        $reader->dateTo=$this->dateTo;

        /** @var LineChartData[] $chartLine */
        $chartLine = [];

        foreach ($this->getLineList() as $lineId) {
            $reader->addLineId($lineId);
            $chartLine[$lineId] = new LineChartData($this);

            $lineReader = new LineReader();
            $lineReader->model->loadTimeSeries();
            $lineRow = $lineReader->getRowById($lineId);

            $chartLine[$lineId]->legend = $lineRow->timeSeries->timeSeries.' - '.$lineRow->line;  //  $lineId;
        }

        $reader->periodTypeId = $this->periodTypeId;

        foreach ($reader->getData() as $item) {
            foreach ($this->getLineList() as $lineId) {
                $chartLine[$lineId]->addValue($item->value[$lineId]);
            }
            $this->addXAxisLabel($item->periodText);
        }

        return parent::getContent();

    }

}