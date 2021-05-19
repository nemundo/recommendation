<?php

namespace Nemundo\Content\App\TimeSeries\Com\ListBox;

use Nemundo\Content\App\TimeSeries\Data\PeriodType\PeriodTypeReader;
use Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesReader;
use Nemundo\Content\App\TimeSeries\Parameter\PeriodTypeParameter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class PeriodTypeListBox extends BootstrapListBox
{

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->name=(new PeriodTypeParameter())->getParameterName();

    }

    public function getContent()
    {

        $this->label = 'Period Type';

        $reader = new PeriodTypeReader();
        foreach ($reader->getData() as $seriesRow) {
            $this->addItem($seriesRow->id, $seriesRow->periodType);
        }

        return parent::getContent();
    }
}