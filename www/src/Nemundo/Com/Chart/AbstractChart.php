<?php

namespace Nemundo\Com\Chart;

use Nemundo\Com\Chart\Data\AbstractChartData;
use Nemundo\Com\Package\PackageTrait;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;

abstract class AbstractChart extends AbstractHtmlContainer
{

    use PackageTrait;

    /**
     * @var string
     */
    public $chartTitle;

    /**
     * @var int
     */
    public $widthPercent = 100;

    /**
     * @var bool
     */
    public $animation = false;

    /**
     * @var bool
     */
    public $showLegend = true;

    /**
     * @var bool
     */
    public $showTooltip = true;

    /**
     * @var int
     */
    public $yMaxValue;

    /**
     * @var int
     */
    public $yMinValue;

    /**
     * @var string
     */
    public $yUnit;

    /**
     * @var string
     */
    public $xUnit;

    /**
     * @var string
     */
    protected $xAxisLabel = '';

    /**
     * @var TextDirectory
     */
    protected $xAxisLabelDirectory = [];

    /**
     * @var string
     */
    protected $yAxis = '';

    /**
     * @var string
     */
    protected $script;

    /**
     * @var AbstractChartData[]
     */
    protected $dataList = [];


    public function __construct(AbstractContainer $parentContainer = null)
    {
        parent::__construct($parentContainer);
        $this->xAxisLabelDirectory = new TextDirectory();
    }


    public function addData(AbstractChartData $chartData)
    {
        $this->dataList[] = $chartData;
        return $this;
    }


    public function addXAxisLabel($label)
    {
        $this->xAxisLabelDirectory->addValue($label);
        return $this;
    }

}