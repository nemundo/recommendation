<?php


namespace Nemundo\Content\App\TimeSeries\Com\Chart;


use Nemundo\Com\Chart\Data\LineChartData;
use Nemundo\Content\App\TimeSeries\Data\Line\LineReader;
use Nemundo\Content\App\TimeSeries\Reader\TimeSeriesValueReader;
use Nemundo\Core\Math\Statistic\Normalizer;

class TimeSeriesNormalizedChart extends AbstractTimesSeriesChart
{

    public function getContent()
    {


        $reader = new TimeSeriesValueReader();
        $reader->dateFrom=$this->dateFrom;
        $reader->dateTo=$this->dateTo;

        /** @var LineChartData[] $chartLine */
        $chartLine = [];

        /** @var Normalizer $normalizer */
        $normalizer=[];

        foreach ($this->getLineList() as $lineId) {
            $reader->addLineId($lineId);
            $chartLine[$lineId] = new LineChartData($this);

            $lineReader = new LineReader();
            $lineReader->model->loadTimeSeries();
            $lineRow = $lineReader->getRowById($lineId);

            $chartLine[$lineId]->legend = $lineRow->timeSeries->timeSeries.' - '.$lineRow->line;  //  $lineId;

            //$chartLine[$lineId]->legend = $lineId;

            $normalizer[$lineId] = new Normalizer();

        }

        $reader->periodTypeId = $this->periodTypeId;

        foreach ($reader->getData() as $item) {
            foreach ($this->getLineList() as $lineId) {
                //$chartLine[$lineId]->addValue($item->value[$lineId]);

                /*if ($item->value[$lineId] == null) {
                    $item->value[$lineId]=0;
                }*/

                $normalizer[$lineId]->addValue($item->value[$lineId]);
            }

            $this->addXAxisLabel($item->periodText);

        }

        foreach ($this->getLineList() as $lineId) {
            foreach ($normalizer[$lineId]->getNormalizedData() as $value) {
                $chartLine[$lineId]->addValue($value);
                //$normalizer[$lineId]chartLine->addValue($value);
            }
        }




        /*
        $lineCount = 0;

        /*$lineReader = new LineReader();
        $lineReader->filter->andEqual($lineReader->model->timeSeriesId, $this->timeSeriesId);*/
/*
        $lineReader=$this->getLineReader();

        foreach ($lineReader->getData() as $lineRow) {

            $chartLine = new LineChartData($this);
            $chartLine->legend = $lineRow->line;

            $timeSeriesPeriodTypeReader = $this->getValueReader($lineRow->id);

            $normalizer = new Normalizer();

            foreach ($timeSeriesPeriodTypeReader->getData() as $dataRow) {

                $normalizer->addValue($dataRow->value);
                if ($lineCount == 0) {
                    $this->addXAxisLabel($dataRow->period->getPeriodText());
                }

            }

            foreach ($normalizer->getNormalizedData() as $value) {
                $chartLine->addValue($value);
            }

            $lineCount++;

        }*/

        return parent::getContent();

    }

}