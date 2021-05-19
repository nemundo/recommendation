<?php

namespace Nemundo\Content\App\TimeSeries\Page;

use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\App\TimeSeries\Base\TimeSeriesValue;
use Nemundo\Content\App\TimeSeries\Com\Chart\TimeSeriesChart;
use Nemundo\Content\App\TimeSeries\Com\Chart\TimeSeriesNormalizedChart;
use Nemundo\Content\App\TimeSeries\Com\ListBox\LineListBox;
use Nemundo\Content\App\TimeSeries\Com\ListBox\TimeSeriesListBox;
use Nemundo\Content\App\TimeSeries\Com\ListBox\YearListBox;
use Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesReader;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesPeriodType\TimeSeriesPeriodTypeReader;
use Nemundo\Content\App\TimeSeries\Data\WidgetLine\WidgetLineReader;
use Nemundo\Content\App\TimeSeries\Parameter\ChartLineParameter;
use Nemundo\Content\App\TimeSeries\Parameter\PeriodTypeParameter;
use Nemundo\Content\App\TimeSeries\Site\ClearLineSite;
use Nemundo\Content\App\TimeSeries\Site\DeleteLineSite;
use Nemundo\Content\App\TimeSeries\Site\SaveLineSite;
use Nemundo\Content\App\TimeSeries\Template\TimeSeriesTemplate;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\YearPeriodType;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Character\HtmlCharacter;
use Nemundo\Html\Form\Input\HiddenInput;
use Nemundo\Html\Heading\H2;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFromToDatePicker;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Listing\BootstrapSiteList;
use Nemundo\Web\Site\Site;

class TimeSeriesPage extends TimeSeriesTemplate
{
    public function getContent()
    {

        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        /*$periodType = new PeriodTypeListBox($formRow);
        $periodType->submitOnChange = true;
        $periodType->searchMode = true;
        $periodType->emptyValueAsDefault = false;*/

        $hidden = new HiddenInput($form);
        $hidden->name = (new PeriodTypeParameter())->getParameterName();
        $hidden->value = (new PeriodTypeParameter())->getValue();


        $timeSeries = new TimeSeriesListBox($formRow);
        $timeSeries->submitOnChange = true;
        $timeSeries->searchMode = true;
        $timeSeries->column = true;
        $timeSeries->columnSize = 2;

        $line = new LineListBox($formRow);
        $line->timeSeriesId = $timeSeries->getValue();
        $line->submitOnChange = true;
        $line->searchMode = true;
        $line->emptyValueAsDefault = false;
        $line->column = true;
        $line->columnSize = 2;


        //if ((new PeriodTypeParameter())->getValue() == (new DayPeriodType())->id) {
        $dateFromTo = new BootstrapFromToDatePicker($formRow);
        $dateFromTo->searchMode = true;
        $dateFromTo->column = true;
        $dateFromTo->columnSize = 2;

        //}

        if ((new PeriodTypeParameter())->getValue() == (new YearPeriodType())->id) {

            $yearFrom = new YearListBox($formRow);
            $yearTo = new YearListBox($formRow);


        }


        //new WeekListBox($formRow);

        new AdminSearchButton($formRow);

        if ($timeSeries->hasValue()) {


            $timeSeriesRow = (new TimeSeriesReader())->getRowById($timeSeries->getValue());

            $layout = new BootstrapThreeColumnLayout($this);
            $layout->col1->columnWidth = 2;
            $layout->col2->columnWidth = 8;
            $layout->col3->columnWidth = 2;


            //$lineTable = new AdminTable($layout->col3);


            $h2 = new H2($layout->col2);
            $h2->content = $timeSeriesRow->timeSeries;

            $p = new Paragraph($layout->col2);
            $p->content = 'Source ' . $timeSeriesRow->source;

            $hyperlink = new UrlHyperlink($layout->col2);
            $hyperlink->openNewWindow = true;
            $hyperlink->content = $timeSeriesRow->source;
            $hyperlink->url = $timeSeriesRow->sourceUrl;

            $p = new Paragraph($layout->col2);
            $p->content = 'Last Update ' . $timeSeriesRow->lastUpdate->getShortDateTimeLeadingZeroFormat();


            $list = new BootstrapSiteList($layout->col1);
            $timeSeriesPeriodTypeReader = new TimeSeriesPeriodTypeReader();
            $timeSeriesPeriodTypeReader->model->loadPeriodType();
            $timeSeriesPeriodTypeReader->filter->andEqual($timeSeriesPeriodTypeReader->model->timeSeriesId, $timeSeries->getValue());
            foreach ($timeSeriesPeriodTypeReader->getData() as $periodTypeRow) {

                if ((new PeriodTypeParameter())->getValue() == $periodTypeRow->periodTypeId) {
                    $list->addActiveText($periodTypeRow->periodType->periodType);
                } else {
                    $site = new Site();
                    $site->title = $periodTypeRow->periodType->periodType;
                    $site->addParameter(new PeriodTypeParameter($periodTypeRow->periodTypeId));
                    $list->addSite($site);
                }
            }


            $p = new Paragraph($layout->col1);
            $p->content = HtmlCharacter::NON_BREAKING_SPACE;

            /*
            $reader = new LineReader();
            $reader->filter->andEqual($reader->model->timeSeriesId,$this->timeSeriesId);
            $reader->addOrder($reader->model->line);
            foreach ($reader->getData() as $lineRow) {
                $this->addItem($lineRow->id,$lineRow->line);
            }*/


            /*$ul = new BootstrapHyperlinkList($layout->col1);  // new UnorderedList($layout->col1);

            $lineReader = new LineReader();
            $lineReader->filter->andEqual($lineReader->model->timeSeriesId, $timeSeries->getValue());
            $lineReader->addOrder($lineReader->model->line);
            foreach ($lineReader->getData() as $periodTypeRow) {

                if ((new WidgetLineParameter())->getValue() == $periodTypeRow->id) {
                    $ul->addActiveHyperlink($periodTypeRow->line);
                } else {
                    $site = new Site();
                    $site->title = $periodTypeRow->line;
                    $site->addParameter(new WidgetLineParameter($periodTypeRow->id));
                    $ul->addSite($site);
                }
            }*/


            $periodTypeParameter = new PeriodTypeParameter();


            $btnDiv = new Div($layout->col2);


            $lineParameter = new ChartLineParameter();
            if (($lineParameter->hasValue()) && ($periodTypeParameter->hasValue())) {

                $btn = new AdminSiteButton($btnDiv);
                $btn->site = clone(SaveLineSite::$site);
                $btn->site->addParameter(new ChartLineParameter());

                $value = new TimeSeriesValue();
                $value->timeSeriesId = $timeSeries->getValue();
                $value->periodTypeId = $periodTypeParameter->getValue();
                /*$value->dateFrom = $dateFromTo->getDateFrom();
                $value->dateTo = $dateFromTo->getDateTo();*/

                /*
                if ((new PeriodTypeParameter())->getValue() == (new DayPeriodType())->id) {
                    $dateFromTo = new BootstrapFromToDatePicker($formRow);
                    $dateFromTo->searchMode = true;
                }

                if ((new PeriodTypeParameter())->getValue() == (new YearPeriodType())->id) {

                    $yearFrom = new YearListBox($formRow);
                    $yearTo = new YearListBox($formRow);


                }*/


                $value->lineId = $lineParameter->getValue();

                $min = $value->getMinValue();
                $max = $value->getMaxValue();

                $p = new Paragraph($layout->col2);
                $p->content = 'Min: ' . $min;

                $p = new Paragraph($layout->col2);
                $p->content = 'Max: ' . $max;

                $chart = new TimeSeriesChart($layout->col2);
                $chart->timeSeriesId = $timeSeries->getValue();
                $chart->periodTypeId = $periodTypeParameter->getValue();
                $chart->dateFrom = $dateFromTo->getDateFrom();
                $chart->dateTo = $dateFromTo->getDateTo();
                $chart->addLineId($lineParameter->getValue());

                /*$chart->yMinValue = $min;
                $chart->yMaxValue = $max;*/

            } else {


                //$chart = new TimeSeriesChart($layout->col2);  //  new TimeSeriesNormalizedChart($layout->col2);
                /*$chart = new TimeSeriesNormalizedChart($layout->col2);
                $chart->timeSeriesId = $timeSeries->getValue();
                $chart->periodTypeId = $periodTypeParameter->getValue();
                $chart->dateFrom = $dateFromTo->getDateFrom();
                $chart->dateTo = $dateFromTo->getDateTo();

                $lineReader=new LineReader();
                $lineReader->filter->andEqual($lineReader->model->timeSeriesId,$timeSeries->getValue());
                foreach ($lineReader->getData() as $lineRow) {
                    $chart->addLineId($lineRow->id);
                }*/

            }


            $btn = new AdminSiteButton($btnDiv);
            $btn->site = clone(ClearLineSite::$site);


            $chart = new TimeSeriesChart($layout->col2);
            $chart->periodTypeId = $periodTypeParameter->getValue();
            $chart->dateFrom = $dateFromTo->getDateFrom();
            $chart->dateTo = $dateFromTo->getDateTo();

            $normalizedChart = new TimeSeriesNormalizedChart($layout->col2);
            $normalizedChart->periodTypeId = $periodTypeParameter->getValue();
            $normalizedChart->dateFrom = $dateFromTo->getDateFrom();
            $normalizedChart->dateTo = $dateFromTo->getDateTo();


            $table = new AdminTable($layout->col3);


            $lineReader = new WidgetLineReader();
            $lineReader->model->loadLine();
            $lineReader->model->line->loadTimeSeries();
            foreach ($lineReader->getData() as $lineRow) {

                $chart->addLineId($lineRow->lineId);
                $normalizedChart->addLineId($lineRow->lineId);

                $site = clone(DeleteLineSite::$site);
                $site->addParameter(new ChartLineParameter($lineRow->id));

                $row = new TableRow($table);
                $row->addText($lineRow->line->timeSeries->timeSeries);
                $row->addText($lineRow->line->line);
                $row->addIconSite($site);

            }

        }

        return parent::getContent();

    }
}