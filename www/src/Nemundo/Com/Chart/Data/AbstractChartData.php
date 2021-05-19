<?php

namespace Nemundo\Com\Chart\Data;


use Nemundo\Com\Chart\AbstractChart;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Directory\TextDirectory;


abstract class AbstractChartData extends AbstractBase
{

    /**
     * @var string
     */
    public $legend;

    /**
     * @var TextDirectory
     */
    public $valueList;

    /**
     * @var string
     */
    public $chartType = ChartType::LINE;

    /**
     * @var bool
     */
    public $smooth = false;

    public $hideDataPoint = true;


    public function __construct(AbstractChart $chart)
    {

        $this->valueList = new TextDirectory();
        $chart->addData($this);

    }

    public function addValue($value)
    {

        if ($value === null) {
            $value = 'null';
        }

        $this->valueList->addValue($value);
        return $this;

    }

}