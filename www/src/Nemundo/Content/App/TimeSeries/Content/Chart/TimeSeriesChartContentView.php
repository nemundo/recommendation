<?php

namespace Nemundo\Content\App\TimeSeries\Content\Chart;

use Nemundo\Content\App\TimeSeries\Com\Chart\TimeSeriesChart;
use Nemundo\Content\View\AbstractContentView;

class TimeSeriesChartContentView extends AbstractContentView
{
    /**
     * @var TimeSeriesChartContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='ff03d7f7-d9d5-4dfd-ae3b-3f7bfdf0c779';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $timeSeriesChartRow = $this->contentType->getDataRow();

        $chart = new TimeSeriesChart($this);
        $chart->timeSeriesId = $timeSeriesChartRow->timeSeriesId;
        $chart->periodTypeId = $timeSeriesChartRow->periodTypeId;
        $chart->dateFrom = $timeSeriesChartRow->dateFrom;
        $chart->dateTo = $timeSeriesChartRow->dateTo;
        $chart->addLineId($timeSeriesChartRow->lineId);

        return parent::getContent();

    }

}