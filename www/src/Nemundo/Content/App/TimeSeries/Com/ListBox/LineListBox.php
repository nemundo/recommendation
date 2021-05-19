<?php

namespace Nemundo\Content\App\TimeSeries\Com\ListBox;

use Nemundo\Content\App\TimeSeries\Data\Line\LineReader;
use Nemundo\Content\App\TimeSeries\Parameter\ChartLineParameter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class LineListBox extends BootstrapListBox
{

    public $timeSeriesId;


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->name = (new ChartLineParameter())->getParameterName();

    }


    public function getContent()
    {

        $this->label = 'Line';

        $reader = new LineReader();
        if ($this->timeSeriesId !== null) {
            $reader->filter->andEqual($reader->model->timeSeriesId, $this->timeSeriesId);
        }
        $reader->addOrder($reader->model->line);
        foreach ($reader->getData() as $lineRow) {
            $this->addItem($lineRow->id, $lineRow->line);
        }

        return parent::getContent();
    }
}