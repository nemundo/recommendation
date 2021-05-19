<?php


namespace Nemundo\Content\App\TimeSeries\Index;


use Nemundo\Content\App\TimeSeries\Data\Line\Line;
use Nemundo\Content\App\TimeSeries\Data\Line\LineId;
use Nemundo\Content\App\TimeSeries\Data\Line\LineReader;
use Nemundo\Content\App\TimeSeries\Data\Line\LineUpdate;
use Nemundo\Content\App\TimeSeries\Data\Period\Period;
use Nemundo\Content\App\TimeSeries\Data\Period\PeriodCount;
use Nemundo\Content\App\TimeSeries\Data\Period\PeriodId;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesData\TimeSeriesData;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesData\TimeSeriesDataReader;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesPeriodType\TimeSeriesPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\AbstractPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\DayPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\MonthPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\MonthSeasonPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\WeekPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\WeekSeasonPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\YearPeriodType;
use Nemundo\Core\Date\Week\WeekYearNumber;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Db\Sql\Field\AbstractField;
use Nemundo\Db\Sql\Field\Aggregate\AverageField;
use Nemundo\Db\Sql\Field\Aggregate\SumField;

trait TimeSeriesIndex
{

    private $lineList = [];

    private $periodDayList = [];

    private $periodWeekList = [];

    private $periodMonthList = [];

    private $periodYearList = [];


    private $lineUniqueList = [];

    public function addTimeData(Date $date, $line, $value)
    {

        return $this;

    }


    public function addHourData(Date $date, $line, $value)
    {

        return $this;

    }


    public function addDayData(Date $date, $line, $value)
    {

        $lineId = $this->saveLine($line);
        $periodId = $this->saveDayPeriod($date);
        $this->saveValue($lineId, $periodId, $value);

        return $this;

    }


    public function addWeekData($week, $year, $line, $value)
    {

        $lineId = $this->saveLine($line);
        $periodId = $this->saveWeekPeriod($week, $year);
        $this->saveValue($lineId, $periodId, $value);

        return $this;

    }


    public function addMonthData($month, $year, $line, $value)
    {

        $lineId = $this->saveLine($line);
        $periodId = $this->saveMonthPeriod($month, $year);

        $this->saveValue($lineId, $periodId, $value);

        return $this;

    }


    public function addYearData($year, $line, $value)
    {

        $lineId = $this->saveLine($line);
        $periodId = $this->saveYearPeriod($year);
        $this->saveValue($lineId, $periodId, $value);

        return $this;

    }


    private function saveLine($line)
    {

        if (!isset($this->lineList[$line])) {

            $data = new Line();
            $data->ignoreIfExists = true;
            $data->timeSeriesId = $this->getDataId();
            $data->uniqueName = $line;
            $data->line = $line;
            $data->save();

            $id = new LineId();
            $id->filter->andEqual($id->model->timeSeriesId, $this->getDataId());
            $id->filter->andEqual($id->model->uniqueName, $line);
            $lineId = $id->getId();

            $this->lineList[$line] = $lineId;

        }

        return $this->lineList[$line];

    }


    private function saveDayPeriod(Date $date)
    {

        if (!isset($this->periodDayList[$date->getIsoDate()])) {

            $this->saveTimeSeriesPeriodType(new DayPeriodType());

            $data = new Period();
            $data->periodTypeId = (new DayPeriodType())->id;
            $data->date = $date;
            $data->week = $date->getWeekNumber();
            $data->year = $date->getYear();
            $data->month = $date->getMonthNumber();
            $data->save();

            $id = new PeriodId();
            $id->filter->andEqual($id->model->periodTypeId, (new DayPeriodType())->id);
            $id->filter->andEqual($id->model->date, $date->getIsoDate());
            $periodId = $id->getId();

            $this->periodDayList[$date->getIsoDate()] = $periodId;

        }

        return $this->periodDayList[$date->getIsoDate()];


    }


    private function saveWeekPeriod($week, $year)
    {

        $weekYear = (new WeekYearNumber())->getWeekYearNumber($week, $year);

        if (!isset($this->periodWeekList[$weekYear])) {

            $this->saveTimeSeriesPeriodType(new WeekPeriodType());

            $count = new PeriodCount();
            $count->filter->andEqual($count->model->periodTypeId, (new WeekPeriodType())->id);
            $count->filter->andEqual($count->model->week, $week);
            $count->filter->andEqual($count->model->year, $year);
            if ($count->getCount() == 0) {
                $data = new Period();
                $data->periodTypeId = (new WeekPeriodType())->id;
                $data->week = $week;
                $data->year = $year;
                $data->weekYear= $weekYear;  // (new WeekYearNumber())->getWeekYearNumber($week, $year);
                $data->save();
            }

            $id = new PeriodId();
            $id->filter->andEqual($id->model->periodTypeId, (new WeekPeriodType())->id);
            $id->filter->andEqual($id->model->week, $week);
            $id->filter->andEqual($id->model->year, $year);
            $periodId = $id->getId();

            $this->periodWeekList[$weekYear] = $periodId;

        }

        return $this->periodWeekList[$weekYear];

    }


    private function saveMonthPeriod($month, $year)
    {

        //$weekYear = (new WeekYearNumber())->getMonthYearNumber($month, $year);

        $this->saveTimeSeriesPeriodType(new MonthPeriodType());

        $count = new PeriodCount();
        $count->filter->andEqual($count->model->periodTypeId, (new MonthPeriodType())->id);
        $count->filter->andEqual($count->model->month, $month);
        $count->filter->andEqual($count->model->year, $year);
        if ($count->getCount() == 0) {
            $data = new Period();
            $data->periodTypeId = (new MonthPeriodType())->id;
            $data->month = $month;
            $data->year = $year;
            $data->monthYear=(new WeekYearNumber())->getMonthYearNumber($month, $year);
            $data->save();
        }

        $id = new PeriodId();
        $id->filter->andEqual($id->model->periodTypeId, (new MonthPeriodType())->id);
        $id->filter->andEqual($id->model->month, $month);
        $id->filter->andEqual($id->model->year, $year);
        $periodId = $id->getId();

        return $periodId;

    }


    private function saveMonthSeasonPeriod($month)
    {

        $this->saveTimeSeriesPeriodType(new MonthSeasonPeriodType());

        $count = new PeriodCount();
        $count->filter->andEqual($count->model->periodTypeId, (new MonthSeasonPeriodType())->id);
        $count->filter->andEqual($count->model->month, $month);
        if ($count->getCount() == 0) {
            $data = new Period();
            $data->periodTypeId = (new MonthSeasonPeriodType())->id;
            $data->month = $month;
            $data->save();
        }

        $id = new PeriodId();
        $id->filter->andEqual($id->model->periodTypeId, (new MonthSeasonPeriodType())->id);
        $id->filter->andEqual($id->model->month, $month);
        $periodId = $id->getId();

        return $periodId;

    }


    private function saveYearPeriod($year)
    {

        $this->saveTimeSeriesPeriodType(new YearPeriodType());

        $count = new PeriodCount();
        $count->filter->andEqual($count->model->periodTypeId, (new YearPeriodType())->id);
        $count->filter->andEqual($count->model->year, $year);
        if ($count->getCount() == 0) {
            $data = new Period();
            $data->year = $year;
            $data->periodTypeId = (new YearPeriodType())->id;
            $data->save();
        }

        $id = new PeriodId();
        $id->filter->andEqual($id->model->periodTypeId, (new YearPeriodType())->id);
        $id->filter->andEqual($id->model->year, $year);
        $periodId = $id->getId();

        return $periodId;

    }


    private function saveTimeSeriesPeriodType(AbstractPeriodType $periodType)
    {

        $data = new TimeSeriesPeriodType();
        $data->ignoreIfExists = true;
        $data->timeSeriesId = $this->getDataId();
        $data->periodTypeId = $periodType->id;
        $data->save();

    }


    private function saveValue($lineId, $periodId, $value)
    {

        if ($value == '') {
            $value = null;
        }

        $data = new TimeSeriesData();
        $data->updateOnDuplicate = true;
        $data->lineId = $lineId;
        $data->periodId = $periodId;
        $data->value = $value;
        $data->save();

        return $this;

    }


    public function saveSumFromDay()
    {

        $this->saveFromTo(new DayPeriodType(), new WeekPeriodType(), new SumField());
        $this->saveFromTo(new DayPeriodType(), new MonthPeriodType(), new SumField());
        $this->saveFromTo(new DayPeriodType(), new YearPeriodType(), new SumField());
        $this->saveFromTo(new DayPeriodType(), new WeekSeasonPeriodType(), new SumField());
        $this->saveFromTo(new DayPeriodType(), new MonthSeasonPeriodType(), new SumField());

    }


    public function saveSumFromWeek()
    {

        $this->saveFromTo(new WeekPeriodType(),  new YearPeriodType(), new SumField());
        $this->saveFromTo(new WeekPeriodType(),  new WeekSeasonPeriodType(), new SumField());

    }


    public function saveSumFromMonth()
    {

        $this->saveFromTo(new MonthPeriodType(),  new YearPeriodType(), new SumField());
        $this->saveFromTo(new MonthPeriodType(),  new MonthSeasonPeriodType(), new SumField());

    }


    //saveAverageFromDay
    public function saveAverageFromDate()
    {

        $this->saveFromTo(new DayPeriodType(),  new WeekPeriodType(), new AverageField());
        $this->saveFromTo(new DayPeriodType(),  new MonthPeriodType(),new AverageField());
        $this->saveFromTo(new DayPeriodType(),  new YearPeriodType(), new AverageField());
        $this->saveFromTo(new DayPeriodType(),  new MonthSeasonPeriodType(), new AverageField());

    }


    private function saveFromTo(AbstractPeriodType $periodTypeFrom, AbstractPeriodType $periodTypeTo,AbstractField $valueField)
    {

        $lineReader = new LineReader();
        $lineReader->filter->andEqual($lineReader->model->timeSeriesId, $this->getDataId());
        foreach ($lineReader->getData() as $lineRow) {

            $reader = new TimeSeriesDataReader();
            $reader->model->loadPeriod();
            $reader->filter->andEqual($reader->model->period->periodTypeId, $periodTypeFrom->id);
            $reader->filter->andEqual($reader->model->lineId, $lineRow->id);

            if ($periodTypeTo->id == (new WeekPeriodType())->id) {
                $reader->addGroup($reader->model->period->week);
                $reader->addGroup($reader->model->period->year);
            }

            if ($periodTypeTo->id == (new MonthPeriodType())->id) {
                $reader->addGroup($reader->model->period->month);
                $reader->addGroup($reader->model->period->year);
            }

            if ($periodTypeTo->id == (new YearPeriodType())->id) {
                $reader->addGroup($reader->model->period->year);
            }

            if ($periodTypeTo->id == (new WeekSeasonPeriodType())->id) {
                $reader->addGroup($reader->model->period->week);
            }

            if ($periodTypeTo->id == (new MonthSeasonPeriodType())->id) {
                $reader->addGroup($reader->model->period->month);
            }

            $valueField->aggregateField = $reader->model->value;
            $reader->addField($valueField);

            foreach ($reader->getData() as $seriesDataRow) {

                $periodId = null;

                if ($periodTypeTo->id == (new WeekPeriodType())->id) {

                    //(new \Nemundo\Core\Debug\Debug())->write($date->getFormat('o'));


                    //(new \Nemundo\Core\Debug\Debug())->write($date->getFormat('o'));

                    $year = $seriesDataRow->period->date->getFormat('o');
                    $periodId = $this->saveWeekPeriod($seriesDataRow->period->week,$year);


                    //$periodId = $this->saveWeekPeriod($seriesDataRow->period->week, $seriesDataRow->period->year);


                }

                if ($periodTypeTo->id == (new MonthPeriodType())->id) {
                    $periodId = $this->saveMonthPeriod($seriesDataRow->period->month, $seriesDataRow->period->year);
                }

                if ($periodTypeTo->id == (new YearPeriodType())->id) {
                    $periodId = $this->saveYearPeriod($seriesDataRow->period->year);
                }

                if ($periodTypeTo->id == (new WeekSeasonPeriodType())->id) {

                }

                if ($periodTypeTo->id == (new MonthSeasonPeriodType())->id) {
                    $periodId = $this->saveMonthSeasonPeriod($seriesDataRow->period->month);
                }

                $this->saveValue($lineRow->id, $periodId, $seriesDataRow->getModelValue($valueField));

            }

        }

    }


    public function addLineDefintion($uniqueName, $line)
    {


        if (!isset($this->lineUniqueList[$uniqueName])) {

            $update = new LineUpdate();
            $update->line = $line;
            $update->filter->andEqual($update->model->timeSeriesId, $this->getDataId());
            $update->filter->andEqual($update->model->uniqueName, $uniqueName);
            $update->update();

            $this->lineUniqueList[$uniqueName] = $line;

        }


    }


}