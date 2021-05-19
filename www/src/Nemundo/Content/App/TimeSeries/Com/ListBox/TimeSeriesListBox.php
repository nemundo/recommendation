<?php

namespace Nemundo\Content\App\TimeSeries\Com\ListBox;

use Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesReader;
use Nemundo\Content\App\TimeSeries\Parameter\TimeSeriesParameter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class TimeSeriesListBox extends BootstrapListBox
{

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->name=(new TimeSeriesParameter())->parameterName;
    }

    public function getContent()
    {

        $this->label = 'Time Series';

        $reader = new TimeSeriesReader();
        foreach ($reader->getData() as $seriesRow) {
            $this->addItem($seriesRow->id, $seriesRow->timeSeries);
        }

        return parent::getContent();
    }
}