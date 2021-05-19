<?php

namespace Nemundo\Com\Chart\Data;


use Nemundo\Package\Echarts\Chart\AbstractEchart;

class BarChartData extends AbstractChartData
{

    public function __construct(AbstractEchart $chart)
    {

        parent::__construct($chart);
        $this->chartType = ChartType::BAR;

    }

}