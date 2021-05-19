<?php


namespace Nemundo\Content\App\TimeSeries\Base;


use Nemundo\Content\App\TimeSeries\Data\TimeSeriesData\TimeSeriesDataReader;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\DayPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\MonthPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\WeekPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\YearPeriodType;
use Nemundo\Core\Date\Week\WeekYearNumber;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Db\Filter\Filter;


// ValueFilterTrait
trait ValueTrait
{

    public $timeSeriesId;

    public $periodTypeId;

    /**
     * @var Date
     */
    public $dateFrom;

    /**
     * @var Date
     */
    public $dateTo;


    public function getValueReader($lineId)
    {

        $timeSeriesPeriodTypeReader = new TimeSeriesDataReader();
        $timeSeriesPeriodTypeReader->model->loadPeriod();
        $timeSeriesPeriodTypeReader->filter->andEqual($timeSeriesPeriodTypeReader->model->lineId, $lineId);
        $timeSeriesPeriodTypeReader->filter->andEqual($timeSeriesPeriodTypeReader->model->period->periodTypeId, $this->periodTypeId);

        if ($this->periodTypeId == (new DayPeriodType())->id) {

            if ($this->dateFrom !== null) {
                $timeSeriesPeriodTypeReader->filter->andEqualOrGreater($timeSeriesPeriodTypeReader->model->period->date, $this->dateFrom->getIsoDate());
            }

            if ($this->dateTo !== null) {
                $timeSeriesPeriodTypeReader->filter->andEqualOrSmaller($timeSeriesPeriodTypeReader->model->period->date, $this->dateTo->getIsoDate());
            }

            $timeSeriesPeriodTypeReader->addOrder($timeSeriesPeriodTypeReader->model->period->date);
        }

        if ($this->periodTypeId == (new WeekPeriodType())->id) {

            if ($this->dateFrom !== null) {
                $weekYear =(new WeekYearNumber())->getWeekYearNumber( $this->dateFrom->getWeekNumber(), $this->dateFrom->getYear());
                $timeSeriesPeriodTypeReader->filter->andEqualOrGreater($timeSeriesPeriodTypeReader->model->period->weekYear, $weekYear);
            }

            if ($this->dateTo !== null) {
                $weekYear =(new WeekYearNumber())->getWeekYearNumber( $this->dateTo->getWeekNumber(), $this->dateTo->getYear());
                $timeSeriesPeriodTypeReader->filter->andEqualOrSmaller($timeSeriesPeriodTypeReader->model->period->weekYear, $weekYear);
            }

            $timeSeriesPeriodTypeReader->addOrder($timeSeriesPeriodTypeReader->model->period->year);
            $timeSeriesPeriodTypeReader->addOrder($timeSeriesPeriodTypeReader->model->period->week);

        }


        if ($this->periodTypeId == (new MonthPeriodType())->id) {

            if ($this->dateFrom !== null) {
                $timeSeriesPeriodTypeReader->filter->andEqualOrGreater($timeSeriesPeriodTypeReader->model->period->month, $this->dateFrom->getMonth());
                $timeSeriesPeriodTypeReader->filter->andEqualOrGreater($timeSeriesPeriodTypeReader->model->period->year, $this->dateFrom->getYear());
            }


            if ($this->dateTo !== null) {
                $timeSeriesPeriodTypeReader->filter->andEqualOrSmaller($timeSeriesPeriodTypeReader->model->period->month, $this->dateTo->getMonth());
                $timeSeriesPeriodTypeReader->filter->andEqualOrSmaller($timeSeriesPeriodTypeReader->model->period->year, $this->dateTo->getYear());
            }

            $timeSeriesPeriodTypeReader->addOrder($timeSeriesPeriodTypeReader->model->period->year);
            $timeSeriesPeriodTypeReader->addOrder($timeSeriesPeriodTypeReader->model->period->month);
        }

        if ($this->periodTypeId == (new YearPeriodType())->id) {

            if ($this->dateFrom !== null) {
                $timeSeriesPeriodTypeReader->filter->andEqualOrGreater($timeSeriesPeriodTypeReader->model->period->year, $this->dateFrom->getYear());
            }

            if ($this->dateTo !== null) {
                $timeSeriesPeriodTypeReader->filter->andEqualOrSmaller($timeSeriesPeriodTypeReader->model->period->year, $this->dateTo->getYear());
            }

            $timeSeriesPeriodTypeReader->addOrder($timeSeriesPeriodTypeReader->model->period->year);
        }

        return $timeSeriesPeriodTypeReader;

    }

}