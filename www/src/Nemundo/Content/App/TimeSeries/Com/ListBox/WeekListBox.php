<?php

namespace Nemundo\Content\App\TimeSeries\Com\ListBox;

use Nemundo\Content\App\TimeSeries\Data\Period\PeriodReader;
use Nemundo\Content\App\TimeSeries\Type\PeriodType\WeekPeriodType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class WeekListBox extends BootstrapListBox
{
    public function getContent()
    {

        $this->label = 'Week';

        $reader = new PeriodReader();
        $reader->filter->andEqual($reader->model->periodTypeId, (new WeekPeriodType())->id);
        $reader->addOrder($reader->model->year);
        $reader->addOrder($reader->model->week);
        foreach ($reader->getData() as $periodRow) {
            $this->addItem($periodRow->id, $periodRow->getWeekYear());
        }

        return parent::getContent();

    }
}