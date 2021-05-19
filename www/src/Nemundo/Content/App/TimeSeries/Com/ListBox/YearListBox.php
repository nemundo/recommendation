<?php

namespace Nemundo\Content\App\TimeSeries\Com\ListBox;

use Nemundo\Content\App\TimeSeries\Data\Period\PeriodReader;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\WeekPeriodType;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\YearPeriodType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class YearListBox extends BootstrapListBox
{
    public function getContent()
    {

        $this->label = 'Year';

        $reader=new PeriodReader();
        $reader->filter->andEqual($reader->model->periodTypeId,(new YearPeriodType())->id);
        $reader->addOrder($reader->model->year);
        foreach ($reader->getData() as $periodRow) {
            $this->addItem($periodRow->id,$periodRow->year);
        }

        return parent::getContent();
    }
}