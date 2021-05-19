<?php

namespace Nemundo\Com\Chart\Data;


// LineData
use Nemundo\Com\Chart\AbstractChart;

class LineChartData extends AbstractChartData
{

    public function __construct(AbstractChart $chart)
    {
        parent::__construct($chart);
        $this->chartType = ChartType::LINE;
    }

}