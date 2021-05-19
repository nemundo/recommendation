<?php

namespace Nemundo\Content\App\TimeSeries\Content\Chart;

use Nemundo\Admin\Parameter\Date\DateFromParameter;
use Nemundo\Admin\Parameter\Date\DateToParameter;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart\TimeSeriesChart;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart\TimeSeriesChartReader;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart\TimeSeriesChartRow;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesChart\TimeSeriesChartUpdate;
use Nemundo\Content\App\TimeSeries\Parameter\PeriodTypeParameter;
use Nemundo\Content\App\TimeSeries\Parameter\TimeSeriesParameter;
use Nemundo\Content\App\TimeSeries\Parameter\ChartLineParameter;
use Nemundo\Content\App\TimeSeries\Site\TimeSeriesSite;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Type\DateTime\Date;

class TimeSeriesChartContentType extends AbstractContentType
{

    public $timeSeriesId;

    public $lineId;

    public $periodTypeId;

    /**
     * @var Date
     */
    public $dateFrom;

    /**
     * @var Date
     */
    public $dateTo;


    protected function loadContentType()
    {
        $this->typeLabel = 'Time Series Chart';
        $this->typeId = 'ce18fa0a-b35e-49a8-93e6-3c01b6ac39ca';
        $this->formClassList[] = TimeSeriesChartContentForm::class;
        $this->viewClassList[] = TimeSeriesChartContentView::class;
        $this->viewSite=TimeSeriesSite::$site;  //ChartSi

    }

    protected function onCreate()
    {

        $data = new TimeSeriesChart();
        $data->timeSeriesId = $this->timeSeriesId;
        $data->lineId = $this->lineId;
        $data->periodTypeId = $this->periodTypeId;
        $data->dateFrom = $this->dateFrom;
        $data->dateTo = $this->dateTo;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new TimeSeriesChartUpdate();
        $update->timeSeriesId = $this->timeSeriesId;
        $update->lineId = $this->lineId;
        $update->periodTypeId = $this->periodTypeId;
        $update->dateFrom = $this->dateFrom;
        $update->dateTo = $this->dateTo;
        $update->updateById($this->dataId);

    }

    protected function onIndex()
    {
    }

    protected function onDataRow()
    {
        $reader = new TimeSeriesChartReader();
        $reader->model->loadTimeSeries();
        $reader->model->loadLine();
        $this->dataRow = $reader->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|TimeSeriesChartRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getTypeLabel()
    {
        $subject = $this->getDataRow()->timeSeries->timeSeries;
        return $subject;

    }

    public function getSubject()
    {

        $subject = $this->getDataRow()->line->line . ' (' .
            $this->getDataRow()->dateFrom->getShortDateLeadingZeroFormat() . ' - ' . $this->getDataRow()->dateTo->getShortDateLeadingZeroFormat().')';


        return $subject;

    }


    public function getViewSite()
    {

        $site = parent::getViewSite();

        $dataRow = $this->getDataRow();
        $site->addParameter(new TimeSeriesParameter($dataRow->timeSeriesId));
        $site->addParameter(new ChartLineParameter($dataRow->lineId));
        $site->addParameter(new DateFromParameter($dataRow->dateFrom->getIsoDate()));
        $site->addParameter(new DateToParameter($dataRow->dateTo->getIsoDate()));
        $site->addParameter(new PeriodTypeParameter($dataRow->periodTypeId));

        return $site;

    }

}