<?php

namespace Nemundo\Content\App\TimeSeries\Page;

use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\TimeSeries\Com\Chart\TimeSeriesChart;
use Nemundo\Content\App\TimeSeries\Com\Chart\TimeSeriesNormalizedChart;
use Nemundo\Content\App\TimeSeries\Com\ListBox\LineListBox;
use Nemundo\Content\App\TimeSeries\Com\ListBox\PeriodTypeListBox;
use Nemundo\Content\App\TimeSeries\Com\ListBox\TimeSeriesListBox;
use Nemundo\Content\App\TimeSeries\Data\Line\LineReader;
use Nemundo\Content\App\TimeSeries\Data\WidgetLine\WidgetLineReader;
use Nemundo\Content\App\TimeSeries\Parameter\ChartLineParameter;
use Nemundo\Content\App\TimeSeries\Site\ClearLineSite;
use Nemundo\Content\App\TimeSeries\Site\DeleteLineSite;
use Nemundo\Content\App\TimeSeries\Site\SaveLineSite;
use Nemundo\Content\App\TimeSeries\Template\TimeSeriesTemplate;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\WeekPeriodType;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFromToDatePicker;

class NormalizedChartPage extends TimeSeriesTemplate
{
    public function getContent()
    {


        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $periodType = new PeriodTypeListBox($formRow);
        $periodType->submitOnChange = true;
        $periodType->searchMode = true;
        //$periodType->emptyValueAsDefault = false;


        /*$timeSeries = new TimeSeriesListBox($formRow);
        $timeSeries->submitOnChange = true;
        $timeSeries->searchMode = true;*/

        /*$line = new LineListBox($formRow);
        $line->timeSeriesId = $timeSeries->getValue();
        $line->submitOnChange = true;
        $line->searchMode = true;
        $line->emptyValueAsDefault = false;*/

        $dateFromTo = new BootstrapFromToDatePicker($formRow);
        $dateFromTo->searchMode = true;

        //$year = new YearListBox($formRow);
        //new WeekListBox($formRow);

        new AdminSearchButton($formRow);


        $chart = new TimeSeriesChart($this);
        $chart->periodTypeId = $periodType->getValue();
        $chart->dateFrom = $dateFromTo->getDateFrom();
        $chart->dateTo = $dateFromTo->getDateTo();

        $normalizedChart = new TimeSeriesNormalizedChart($this);
        $normalizedChart->periodTypeId = $periodType->getValue();
        $normalizedChart->dateFrom = $dateFromTo->getDateFrom();
        $normalizedChart->dateTo = $dateFromTo->getDateTo();


        $btn=new AdminSiteButton($this);
        $btn->site=clone(ClearLineSite::$site);



        $table = new AdminTable($this);

        $lineReader=new WidgetLineReader();
        $lineReader->model->loadLine();
        $lineReader->model->line->loadTimeSeries();
        foreach ($lineReader->getData() as $lineRow) {

            $chart->addLineId($lineRow->lineId);
            $normalizedChart->addLineId($lineRow->lineId);

            $site=clone(DeleteLineSite::$site);
            $site->addParameter(new ChartLineParameter($lineRow->id));

            $row=new TableRow($table);
            $row->addText($lineRow->line->timeSeries->timeSeries);
            $row->addText($lineRow->line->line);
            $row->addIconSite($site);

        }

        return parent::getContent();

    }

}