<?php
namespace Nemundo\Content\App\TimeSeries\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class TimeSeriesModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\TimeSeries\Data\Line\LineModel());
$this->addModel(new \Nemundo\Content\App\TimeSeries\Data\Period\PeriodModel());
$this->addModel(new \Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodTypeModel());
$this->addModel(new \Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesModel());
$this->addModel(new \Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart\TimeSeriesChartModel());
$this->addModel(new \Nemundo\Content\App\TimeSeries\Data\TimeSeriesData\TimeSeriesDataModel());
$this->addModel(new \Nemundo\Content\App\TimeSeries\Data\TimeSeriesPeriodType\TimeSeriesPeriodTypeModel());
$this->addModel(new \Nemundo\Content\App\TimeSeries\Data\Unit\UnitModel());
$this->addModel(new \Nemundo\Content\App\TimeSeries\Data\WidgetLine\WidgetLineModel());
}
}