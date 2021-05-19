<?php

namespace Nemundo\Com\Chart\Data;


use Nemundo\Com\Chart\AbstractChart;


class ScatterData extends AbstractChartData
{

    public function __construct(AbstractChart $chart)
    {
        parent::__construct($chart);
        $this->chartType = ChartType::SCATTER;
    }

}