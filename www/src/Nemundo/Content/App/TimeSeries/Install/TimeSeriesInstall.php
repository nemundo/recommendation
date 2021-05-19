<?php

namespace Nemundo\Content\App\TimeSeries\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\App\TimeSeries\Application\TimeSeriesApplication;
use Nemundo\Content\App\TimeSeries\Content\TimeSeries\TimeSeriesContentType;
use Nemundo\Content\App\TimeSeries\Content\Chart\TimeSeriesChartContentType;
use Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodType;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesModelCollection;
use Nemundo\Content\App\TimeSeries\Script\TimeSeriesCleanScript;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\AbstractPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\DayPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\HourPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\MonthPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\MonthSeasonPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\WeekPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\WeekSeasonPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\YearPeriodType;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class TimeSeriesInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new TimeSeriesApplication());

        (new ModelCollectionSetup())
            ->addCollection(new TimeSeriesModelCollection());

        (new ScriptSetup(new TimeSeriesApplication()))
            ->addScript(new TimeSeriesCleanScript());

        (new ContentTypeSetup(new TimeSeriesApplication()))
            ->addContentType(new TimeSeriesContentType())
            ->addContentType(new TimeSeriesChartContentType());

        $this->addPeriodType(new DayPeriodType());
        $this->addPeriodType(new WeekPeriodType());
        $this->addPeriodType(new MonthPeriodType());
        $this->addPeriodType(new YearPeriodType());
        $this->addPeriodType(new HourPeriodType());
        $this->addPeriodType(new WeekSeasonPeriodType());
        $this->addPeriodType(new MonthSeasonPeriodType());

    }


    private function addPeriodType(AbstractPeriodType $periodType)
    {

        $data = new PeriodType();
        $data->updateOnDuplicate = true;
        $data->id = $periodType->id;
        $data->periodType = $periodType->periodType;
        $data->save();

    }

}