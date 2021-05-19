<?php


namespace Nemundo\Content\App\TimeSeries\Com\Chart;


use Nemundo\Com\Chart\Data\LineChartData;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesData\TimeSeriesDataReader;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\MonthPeriodType;
use Nemundo\Core\Math\Statistic\Normalizer;
use Nemundo\Package\Echarts\Chart\AbstractEchart;

class YearMonthNormalizedChart extends AbstractEchart  // AbstractTimesSeriesChart
{

    public $lineId;


    public function getContent()
    {

        $count = 0;

        $periodType = new MonthPeriodType();

        $yearReader = new TimeSeriesDataReader();
        $yearReader->model->loadPeriod();
        $yearReader->filter->andEqual($yearReader->model->lineId, $this->lineId);
        $yearReader->filter->andEqual($yearReader->model->period->periodTypeId, $periodType->id);
        $yearReader->addGroup($yearReader->model->period->year);
        foreach ($yearReader->getData() as $yearRow) {

            $year = $yearRow->period->year;

            $chartLine = new LineChartData($this);
            $chartLine->legend = $year;


            $normalizer = new Normalizer();


            $timeSeriesPeriodTypeReader = new TimeSeriesDataReader();
            $timeSeriesPeriodTypeReader->model->loadPeriod();
            $timeSeriesPeriodTypeReader->filter->andEqual($timeSeriesPeriodTypeReader->model->lineId, $this->lineId);
            $timeSeriesPeriodTypeReader->filter->andEqual($timeSeriesPeriodTypeReader->model->period->periodTypeId, $periodType->id);
            $timeSeriesPeriodTypeReader->filter->andEqual($timeSeriesPeriodTypeReader->model->period->year, $year);
            $timeSeriesPeriodTypeReader->addOrder($timeSeriesPeriodTypeReader->model->period->month);
            foreach ($timeSeriesPeriodTypeReader->getData() as $dataRow) {

                $normalizer->addValue($dataRow->value);

                //$chartLine->addValue($dataRow->value);

                if ($count == 0) {
                    $this->addXAxisLabel($dataRow->period->month);
                }


            }

            foreach ($normalizer->getNormalizedData() as $value) {
                $chartLine->addValue($value);
            }


            $count++;

        }


        return parent::getContent();

    }

}