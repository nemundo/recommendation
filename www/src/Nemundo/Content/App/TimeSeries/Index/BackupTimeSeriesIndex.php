<?php


namespace Nemundo\Content\App\TimeSeries\Index;


use Nemundo\Content\App\TimeSeries\Data\Line\Line;
use Nemundo\Content\App\TimeSeries\Data\Line\LineId;
use Nemundo\Content\App\TimeSeries\Data\Line\LineReader;
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
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Db\Sql\Field\AbstractField;
use Nemundo\Db\Sql\Field\Aggregate\AverageField;
use Nemundo\Db\Sql\Field\Aggregate\SumField;

trait BackupTimeSeriesIndex
{


    /*
    public function saveTimeSeries() {

        $data= new TimeSeries();
        $data->timeSeries=$this->getSubject();
        $data->save();

    }*/


    private $dataDate = [];

    private $dataYear = [];


    public function addTimeData(Date $date, $line, $value)
    {

        $this->dataDate[$line][$date->getIsoDate()] = $value;
        return $this;

    }


    public function addHourData(Date $date, $line, $value)
    {

        $this->dataDate[$line][$date->getIsoDate()] = $value;
        return $this;

    }


    public function addDateData(Date $date, $line, $value)
    {


        $lineId=$this->saveLine($line);
        $periodId=        $this->saveDayPeriod($date);

        $this->saveValue($lineId,$periodId,$value);


        //$this->dataDate[$line][$date->getIsoDateFormat()] = $value;


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

        //$this->dataYear[$line][$year] = $value;

        $lineId = $this->saveLine($line);
        $periodId = $this->saveYearPeriod($year);
        $this->saveValue($lineId, $periodId, $value);

        return $this;

    }


    public function saveTimeSeriesData()
    {

        foreach ($this->dataDate as $key => $value) {

            $lineId = $this->saveLine($key);

            /*
            $data = new Line();
            $data->ignoreIfExists = true;
            $data->timeSeriesId = $this->getDataId();
            $data->uniqueName = $key;
            $data->line = $key;
            $data->save();

            $id = new LineId();
            $id->filter->andEqual($id->model->uniqueName, $key);
            $lineId = $id->getId();*/

            foreach ($value as $isoDate => $itemValue) {

                $date = new Date($isoDate);

               $periodId= $this->saveDayPeriod($date);
               $this->saveValue($lineId,$periodId,$itemValue);


                /*
                $data = new Period();
                $data->periodTypeId = (new DatePeriodType())->id;
                $data->date = $date;
                $data->week = $date->getWeekNumber();
                $data->year = $date->getYear();
                $data->weekYear = $date->getWeekYearNumber();
                $data->month = $date->getMonthNumber();
                $data->monthYear = $date->getMonthYearNumber();
                $data->save();

                $id = new PeriodId();
                $id->filter->andEqual($id->model->date, $isoDate);
                $periodId = $id->getId();*/

                /*$data = new TimeSeriesData();
                $data->updateOnDuplicate = true;
                $data->lineId = $lineId;
                $data->periodId = $periodId;
                $data->value = $itemValue;
                $data->save();*/

            }

        }



        /*
        foreach ($this->dataYear as $key => $value) {

            $data = new Line();
            $data->ignoreIfExists = true;
            $data->timeSeriesId = $this->getDataId();
            $data->uniqueName = $key;
            $data->line = $key;
            $data->save();

            $id = new LineId();
            $id->filter->andEqual($id->model->uniqueName, $key);
            $lineId = $id->getId();

            foreach ($value as $isoDate => $itemValue) {

                $data = new Period();
                $data->periodTypeId = (new YearPeriodType())->id;
                $data->year = $isoDate;
                $data->save();

                $id = new PeriodId();
                $id->filter->andEqual($id->model->periodTypeId, (new YearPeriodType())->id);
                $id->filter->andEqual($id->model->year, $isoDate);
                $periodId = $id->getId();

                $data = new TimeSeriesData();
                $data->updateOnDuplicate = true;
                $data->lineId = $lineId;
                $data->periodId = $periodId;
                $data->value = $itemValue;
                $data->save();

            }

        }*/

    }


    private function saveLine($line)
    {

        $data = new Line();
        $data->ignoreIfExists = true;
        $data->timeSeriesId = $this->getDataId();
        $data->uniqueName = $line;
        $data->line = $line;
        $data->save();

        $id = new LineId();
        $id->filter->andEqual($id->model->uniqueName, $line);
        $lineId = $id->getId();

        return $lineId;

    }



    private function saveDayPeriod(Date $date) {

        $data=new TimeSeriesPeriodType();
        $data->ignoreIfExists=true;
        $data->timeSeriesId =$this->getDataId();
        $data->periodTypeId=(new DayPeriodType())->id;
        $data->save();


        $data = new Period();
        $data->periodTypeId = (new DayPeriodType())->id;
        $data->date = $date;
        $data->week = $date->getWeekNumber();
        $data->year = $date->getYear();
        $data->weekYear = $date->getWeekYearNumber();
        $data->month = $date->getMonthNumber();
        $data->monthYear = $date->getMonthYearNumber();
        $data->save();

        $id = new PeriodId();
        $id->filter->andEqual($id->model->date, $date->getIsoDate());
        $periodId = $id->getId();

        return $periodId;


    }



    private function saveWeekPeriod($week, $year)
    {

        $data=new TimeSeriesPeriodType();
        $data->ignoreIfExists=true;
        $data->timeSeriesId =$this->getDataId();
        $data->periodTypeId=(new WeekPeriodType())->id;
        $data->save();

        $count = new PeriodCount();
        $count->filter->andEqual($count->model->periodTypeId, (new WeekPeriodType())->id);
        $count->filter->andEqual($count->model->week, $week);
        $count->filter->andEqual($count->model->year, $year);
        if ($count->getCount() == 0) {
            $data = new Period();
            $data->periodTypeId = (new WeekPeriodType())->id;
            $data->week = $week;
            $data->year = $year;
            $data->save();
        }

        $id = new PeriodId();
        $id->filter->andEqual($id->model->periodTypeId, (new WeekPeriodType())->id);
        $id->filter->andEqual($id->model->week, $week);
        $id->filter->andEqual($id->model->year, $year);
        $periodId = $id->getId();

        return $periodId;

    }



    private function saveMonthPeriod($month, $year)
    {

        $data=new TimeSeriesPeriodType();
        $data->ignoreIfExists=true;
        $data->timeSeriesId =$this->getDataId();
        $data->periodTypeId=(new MonthPeriodType())->id;
        $data->save();

        $count = new PeriodCount();
        $count->filter->andEqual($count->model->periodTypeId, (new MonthPeriodType())->id);
        $count->filter->andEqual($count->model->month,$month);
        $count->filter->andEqual($count->model->year, $year);
        if ($count->getCount() == 0) {
            $data = new Period();
            $data->periodTypeId = (new MonthPeriodType())->id;
            $data->month = $month;
            $data->year = $year;
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

        $data=new TimeSeriesPeriodType();
        $data->ignoreIfExists=true;
        $data->timeSeriesId =$this->getDataId();
        $data->periodTypeId=(new MonthSeasonPeriodType())->id;
        $data->save();

        $count = new PeriodCount();
        $count->filter->andEqual($count->model->periodTypeId, (new MonthSeasonPeriodType())->id);
        $count->filter->andEqual($count->model->month,$month);
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

        $data=new TimeSeriesPeriodType();
        $data->ignoreIfExists=true;
        $data->timeSeriesId =$this->getDataId();
        $data->periodTypeId=(new YearPeriodType())->id;
        $data->save();

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


    private function saveValue($lineId, $periodId, $value)
    {

        if ($value =='') {
            $value=null;
        }

        $data = new TimeSeriesData();
        $data->updateOnDuplicate = true;
        $data->lineId = $lineId;
        $data->periodId = $periodId;
        $data->value = $value;
        $data->save();

        return $this;

    }


    public function saveSumFromDate()
    {

        $this->saveFromDate(new SumField(), new WeekPeriodType());
        $this->saveFromDate(new SumField(), new MonthPeriodType());
        $this->saveFromDate(new SumField(), new YearPeriodType());
        $this->saveFromDate(new SumField(), new WeekSeasonPeriodType());
        $this->saveFromDate(new SumField(), new MonthSeasonPeriodType());

    }


    public function saveAverageFromDate()
    {

        $this->saveFromDate(new AverageField(), new WeekPeriodType());
        $this->saveFromDate(new AverageField(), new MonthPeriodType());
        $this->saveFromDate(new AverageField(), new YearPeriodType());
        $this->saveFromDate(new AverageField(), new WeekSeasonPeriodType());
        $this->saveFromDate(new AverageField(), new MonthSeasonPeriodType());

    }




    /*
    public function addWeekYearTimeSeriesData($week, $year, $value)
    {

        $data = new Period();
        $data->ignoreIfExists = true;
        $data->year = $year;
        $data->week = $week;
        $data->periodTypeId = (new WeekPeriodType())->id;
        $data->save();

        $id = new PeriodId();
        $id->filter->andEqual($id->model->periodTypeId, (new WeekPeriodType())->id);
        $id->filter->andEqual($id->model->year, $year);
        $id->filter->andEqual($id->model->week, $week);
        $periodId = $id->getId();

        $data = new TimeSeriesData();
        $data->updateOnDuplicate = true;
        //$data->periodTypeId=(new WeekPeriodType())->id;
        $data->timeSeriesId = $this->getDataId();
        $data->timePeriodId = $periodId;
        $data->value = $value;
        $data->save();


        // save year


    }*/


    /*
    public function saveWeekFromDate()
    {

        $periodType = new DatePeriodType();

        $lineReader = new LineReader();
        $lineReader->filter->andEqual($lineReader->model->timeSeriesId, $this->getDataId());
        foreach ($lineReader->getData() as $lineRow) {

            $reader = new TimeSeriesDataReader();
            $reader->model->loadPeriod();
            $reader->filter->andEqual($reader->model->period->periodTypeId, $periodType->id);
            $reader->filter->andEqual($reader->model->lineId, $lineRow->id);
            //$reader->filter->andEqual($reader->model->timeSeriesId,$this->getDataId());

            $reader->addGroup($reader->model->period->weekYear);

            $avg = new SumField();  // new AverageField($reader);
            $avg->aggregateField = $reader->model->value;

            $reader->addField()

            foreach ($reader->getData() as $seriesDataRow) {

                $count = new PeriodCount();
                $count->filter->andEqual($count->model->periodTypeId, (new WeekPeriodType())->id);
                $count->filter->andEqual($count->model->weekYear, $seriesDataRow->period->weekYear);
                if ($count->getCount() == 0) {

                    $data = new Period();
                    $data->year = $seriesDataRow->period->year;
                    $data->week = $seriesDataRow->period->week;
                    $data->weekYear = $seriesDataRow->period->weekYear;
                    $data->periodTypeId = (new WeekPeriodType())->id;
                    $data->save();

                }

                $id = new PeriodId();
                $id->filter->andEqual($id->model->periodTypeId, (new WeekPeriodType())->id);
                $id->filter->andEqual($count->model->weekYear, $seriesDataRow->period->weekYear);
                $periodId = $id->getId();

                $data = new TimeSeriesData();
                $data->updateOnDuplicate = true;
                $data->periodId = $periodId;
                $data->lineId = $lineRow->id;
                $data->value = $seriesDataRow->getModelValue($avg);
                $data->save();

            }

        }


    }*/


    /*
    public function saveSumWeekFromDate()
    {

        $this->saveFromDate(new SumField(), new WeekPeriodType());

    }

    /*
        public function saveAverageWeekFromDate()
        {

            $this->saveFromDate(new AverageField(),new WeekPeriodType());

        }*/


    /*
    public function saveSumMonthFromDate()
    {

        $this->saveFromDate(new SumField(), new MonthPeriodType());

    }

    public function saveSumYearFromDate()
    {

        $this->saveFromDate(new SumField(), new YearPeriodType());

    }*/


    private function saveFromDate(AbstractField $valueField, AbstractPeriodType $periodType)
    {

        $periodType1 = new DayPeriodType();

        $lineReader = new LineReader();
        $lineReader->filter->andEqual($lineReader->model->timeSeriesId, $this->getDataId());
        foreach ($lineReader->getData() as $lineRow) {

            $reader = new TimeSeriesDataReader();
            $reader->model->loadPeriod();
            $reader->filter->andEqual($reader->model->period->periodTypeId, $periodType1->id);
            $reader->filter->andEqual($reader->model->lineId, $lineRow->id);

            if ($periodType->id == (new WeekPeriodType())->id) {
                $reader->addGroup($reader->model->period->weekYear);
            }

            if ($periodType->id == (new MonthPeriodType())->id) {
                $reader->addGroup($reader->model->period->monthYear);
            }

            if ($periodType->id == (new YearPeriodType())->id) {
                $reader->addGroup($reader->model->period->year);
            }

            if ($periodType->id == (new WeekSeasonPeriodType())->id) {
                $reader->addGroup($reader->model->period->week);
            }

            if ($periodType->id == (new MonthSeasonPeriodType())->id) {
                $reader->addGroup($reader->model->period->month);
            }


            $valueField->aggregateField = $reader->model->value;
            $reader->addField($valueField);

            foreach ($reader->getData() as $seriesDataRow) {

                $count = new PeriodCount();
                $count->filter->andEqual($count->model->periodTypeId, $periodType->id);

                if ($periodType->id == (new WeekPeriodType())->id) {
                    $count->filter->andEqual($count->model->weekYear, $seriesDataRow->period->weekYear);
                }

                if ($periodType->id == (new MonthPeriodType())->id) {
                    $count->filter->andEqual($count->model->monthYear, $seriesDataRow->period->monthYear);
                }

                if ($periodType->id == (new YearPeriodType())->id) {
                    $count->filter->andEqual($count->model->year, $seriesDataRow->period->year);
                }

                if ($periodType->id == (new WeekSeasonPeriodType())->id) {
                    $count->filter->andEqual($count->model->week, $seriesDataRow->period->week);
                }

                if ($periodType->id == (new MonthSeasonPeriodType())->id) {
                    $count->filter->andEqual($count->model->month, $seriesDataRow->period->month);
                }


                if ($count->getCount() == 0) {

                    $data = new Period();
                    $data->year = $seriesDataRow->period->year;
                    $data->week = $seriesDataRow->period->week;
                    $data->weekYear = $seriesDataRow->period->weekYear;
                    $data->month = $seriesDataRow->period->month;
                    $data->monthYear = $seriesDataRow->period->monthYear;
                    $data->periodTypeId = $periodType->id;
                    $data->save();

                }

                $id = new PeriodId();
                $id->filter->andEqual($id->model->periodTypeId, $periodType->id);

                if ($periodType->id == (new WeekPeriodType())->id) {
                    $id->filter->andEqual($count->model->weekYear, $seriesDataRow->period->weekYear);
                }

                if ($periodType->id == (new MonthPeriodType())->id) {
                    $id->filter->andEqual($count->model->monthYear, $seriesDataRow->period->monthYear);
                }

                if ($periodType->id == (new YearPeriodType())->id) {
                    $id->filter->andEqual($count->model->year, $seriesDataRow->period->year);
                }

                if ($periodType->id == (new WeekSeasonPeriodType())->id) {
                    $id->filter->andEqual($count->model->week, $seriesDataRow->period->week);
                }

                if ($periodType->id == (new MonthSeasonPeriodType())->id) {
                    $id->filter->andEqual($count->model->month, $seriesDataRow->period->month);
                }


                $periodId = $id->getId();

                $data = new TimeSeriesData();
                $data->updateOnDuplicate = true;
                $data->periodId = $periodId;
                $data->lineId = $lineRow->id;
                $data->value = $seriesDataRow->getModelValue($valueField);
                $data->save();

            }

        }

    }









    /*

    public function saveYearFromDate()
    {

        $periodType = new YearPeriodType();


        $lineReader = new LineReader();
        $lineReader->filter->andEqual($lineReader->model->timeSeriesId, $this->getDataId());
        foreach ($lineReader->getData() as $lineRow) {

            $reader = new TimeSeriesDataReader();
            $reader->model->loadPeriod();
            $reader->filter->andEqual($reader->model->period->periodTypeId, (new DatePeriodType())->id);
            $reader->filter->andEqual($reader->model->lineId, $lineRow->id);
            $reader->addGroup($reader->model->period->year);

            $avg = new SumField($reader);
            $avg->aggregateField = $reader->model->value;

            foreach ($reader->getData() as $seriesDataRow) {

                $count = new PeriodCount();
                $count->filter->andEqual($count->model->periodTypeId, $periodType->id);
                $count->filter->andEqual($count->model->year, $seriesDataRow->period->year);
                if ($count->getCount() == 0) {

                    $data = new Period();
                    $data->year = $seriesDataRow->period->year;
                    $data->periodTypeId = $periodType->id;
                    $data->save();

                }

                $id = new PeriodId();
                $id->filter->andEqual($id->model->periodTypeId, $periodType->id);
                $id->filter->andEqual($count->model->year, $seriesDataRow->period->year);
                $periodId = $id->getId();

                $data = new TimeSeriesData();
                $data->updateOnDuplicate = true;
                $data->periodId = $periodId;
                $data->lineId = $lineRow->id;
                $data->value = $seriesDataRow->getModelValue($avg);
                $data->save();

            }

        }


    }


    public function saveAverageYearFromDate()
    {

        $periodType = new YearPeriodType();


        $lineReader = new LineReader();
        $lineReader->filter->andEqual($lineReader->model->timeSeriesId, $this->getDataId());
        foreach ($lineReader->getData() as $lineRow) {

            $reader = new TimeSeriesDataReader();
            $reader->model->loadPeriod();
            $reader->filter->andEqual($reader->model->period->periodTypeId, (new DatePeriodType())->id);
            $reader->filter->andEqual($reader->model->lineId, $lineRow->id);
            $reader->addGroup($reader->model->period->year);

            $avg = new AverageField($reader);
            $avg->aggregateField = $reader->model->value;

            foreach ($reader->getData() as $seriesDataRow) {

                $count = new PeriodCount();
                $count->filter->andEqual($count->model->periodTypeId, $periodType->id);
                $count->filter->andEqual($count->model->year, $seriesDataRow->period->year);
                if ($count->getCount() == 0) {

                    $data = new Period();
                    $data->year = $seriesDataRow->period->year;
                    $data->periodTypeId = $periodType->id;
                    $data->save();

                }

                $id = new PeriodId();
                $id->filter->andEqual($id->model->periodTypeId, $periodType->id);
                $id->filter->andEqual($count->model->year, $seriesDataRow->period->year);
                $periodId = $id->getId();

                $data = new TimeSeriesData();
                $data->updateOnDuplicate = true;
                $data->periodId = $periodId;
                $data->lineId = $lineRow->id;
                $data->value = $seriesDataRow->getModelValue($avg);
                $data->save();

            }

        }


    }*/


    /*
    public function saveWeekFromDate()
    {

        // average/total


        $periodType = (new DatePeriodType());

        $yearList = [];

        $reader = new TimeSeriesDataReader();
        $reader->model->loadTimePeriod();
        $reader->filter->andEqual($reader->model->timePeriodId, $periodType->id);
        //$reader->filter->andEqual($reader->model->timeSeriesId,$this->getDataId());
        foreach ($reader->getData() as $seriesDataRow) {

            $dateIso = $seriesDataRow->timePeriod->date->getIsoDateFormat();

            if (!isset($yearList[$dateIso])) {
                $yearList[$dateIso] = 0;
            }

            $yearList[$dateIso] = $yearList[$dateIso] + $seriesDataRow->value;


        }


        foreach ($yearList as $year => $value) {

            $data = new Period();
            $data->ignoreIfExists = true;
            $data->date->fromIsoFormat($year);
            $data->periodTypeId = $periodType->id;
            $data->save();

            $id = new PeriodId();
            $id->filter->andEqual($id->model->periodTypeId, $periodType->id);
            $id->filter->andEqual($id->model->date, $year);
            $periodId = $id->getId();


            $data = new TimeSeriesData();
            $data->updateOnDuplicate = true;
            $data->timePeriodId = $periodId;
            //$data->p per(new YearPeriodType())->id;
            $data->lineId =
                //$data->timeSeriesId = $this->getDataId();
                //$data->timePeriodId = $this->getDataId();
            $data->value = $value;
            $data->save();

        }


    }*/



    public function saveWeekFromDay()
    {

        $this->saveFromDate(new SumField(), (new WeekPeriodType()));

        /*
        $lineReader = new LineReader();
        $lineReader->filter->andEqual($lineReader->model->timeSeriesId, $this->getDataId());
        foreach ($lineReader->getData() as $lineRow) {

            $reader = new TimeSeriesDataReader();
            $reader->model->loadPeriod();
            $reader->filter->andEqual($reader->model->period->periodTypeId, (new DatePeriodType())->id);
            $reader->filter->andEqual($reader->model->lineId, $lineRow->id);
            $reader->addGroup($reader->model->period->week);

            $sum = new SumField($reader);
            $sum->aggregateField = $reader->model->value;

            foreach ($reader->getData() as $seriesDataRow) {
                $periodId = $this->saveWeekPeriod($seriesDataRow->period->week, $seriesDataRow->period->year);
                $this->saveValue($lineRow->id, $periodId, $seriesDataRow->getModelValue($sum));
            }

        }*/

    }


    public function saveAverageWeekFromDay()
    {



    }




    public function saveMonthFromDay()
    {

        $lineReader = new LineReader();
        $lineReader->filter->andEqual($lineReader->model->timeSeriesId, $this->getDataId());
        foreach ($lineReader->getData() as $lineRow) {

            $reader = new TimeSeriesDataReader();
            $reader->model->loadPeriod();
            $reader->filter->andEqual($reader->model->period->periodTypeId, (new DayPeriodType())->id);
            $reader->filter->andEqual($reader->model->lineId, $lineRow->id);
            $reader->addGroup($reader->model->period->month);
            $reader->addGroup($reader->model->period->year);

            $sum = new SumField($reader);
            $sum->aggregateField = $reader->model->value;

            foreach ($reader->getData() as $seriesDataRow) {
                $periodId = $this->saveMonthPeriod($seriesDataRow->period->month, $seriesDataRow->period->year);
                $this->saveValue($lineRow->id, $periodId, $seriesDataRow->getModelValue($sum));
            }

        }


    }


    public function saveYearFromDay()
    {

        $lineReader = new LineReader();
        $lineReader->filter->andEqual($lineReader->model->timeSeriesId, $this->getDataId());
        foreach ($lineReader->getData() as $lineRow) {

            $reader = new TimeSeriesDataReader();
            $reader->model->loadPeriod();
            $reader->filter->andEqual($reader->model->period->periodTypeId, (new DayPeriodType())->id);
            $reader->filter->andEqual($reader->model->lineId, $lineRow->id);
            $reader->addGroup($reader->model->period->year);

            $sum = new SumField($reader);
            $sum->aggregateField = $reader->model->value;

            foreach ($reader->getData() as $seriesDataRow) {
                $periodId = $this->saveYearPeriod($seriesDataRow->period->year);
                $this->saveValue($lineRow->id, $periodId, $seriesDataRow->getModelValue($sum));
            }

        }


    }




    public function saveMonthSeason()
    {

        $lineReader = new LineReader();
        $lineReader->filter->andEqual($lineReader->model->timeSeriesId, $this->getDataId());
        foreach ($lineReader->getData() as $lineRow) {

            $reader = new TimeSeriesDataReader();
            $reader->model->loadPeriod();
            $reader->filter->andEqual($reader->model->period->periodTypeId, (new MonthPeriodType())->id);
            $reader->filter->andEqual($reader->model->lineId, $lineRow->id);
            $reader->addGroup($reader->model->period->month);

            $sum = new SumField($reader);
            $sum->aggregateField = $reader->model->value;

            foreach ($reader->getData() as $seriesDataRow) {
                $periodId = $this->saveMonthSeasonPeriod($seriesDataRow->period->month);
                $this->saveValue($lineRow->id, $periodId, $seriesDataRow->getModelValue($sum));
            }

        }


    }




    public function saveYearFromWeek()
    {

        $lineReader = new LineReader();
        $lineReader->filter->andEqual($lineReader->model->timeSeriesId, $this->getDataId());
        foreach ($lineReader->getData() as $lineRow) {

            //$yearList = [];

            $reader = new TimeSeriesDataReader();
            $reader->model->loadPeriod();
            $reader->filter->andEqual($reader->model->period->periodTypeId, (new WeekPeriodType())->id);
            $reader->filter->andEqual($reader->model->lineId, $lineRow->id);  // $this->getDataId());
            $reader->addGroup($reader->model->period->year);

            $sum = new SumField($reader);
            $sum->aggregateField = $reader->model->value;

            foreach ($reader->getData() as $seriesDataRow) {
                $periodId = $this->saveYearPeriod($seriesDataRow->period->year);
                $this->saveValue($lineRow->id, $periodId, $seriesDataRow->getModelValue($sum));
            }

        }


    }


    /*
        public function addYearTimeSeriesData($year, $value)
        {


            $data = new YearPeriod();
            $data->year = $year;
            $data->save();

            $id = new YearPeriodId();
            $id->filter->andEqual($id->model->year, $year);
            $periodId = $id->getId();

            $data = new TimeSeriesData();
            $data->timeSeriesId = $this->getDataId();
            $data->timePeriodId = $periodId;
            $data->value = $value;
            $data->save();

        }*/


}