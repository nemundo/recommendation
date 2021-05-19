<?php

namespace Nemundo\Package\Echarts\Chart;


use Nemundo\Com\Chart\AbstractChart;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\Package\PackageTrait;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Core\Type\Number\YesNo;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Script\JavaScript;
use Nemundo\Package\Echarts\Package\EchartsPackage;
use Nemundo\Package\Jquery\Code\JqueryReadyCode;

abstract class AbstractEchart extends AbstractChart
{

    use LibraryTrait;

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


    public function getContent()
    {

        $this->addPackage(new EchartsPackage());

        $chartId = (new UniqueId())->getUniqueId();

        $div = new Div($this);
        $div->id = $chartId;
        $div->addAttribute('style', 'width:' . $this->widthPercent . '%; height:400px;');

        $this->addJqueryScript('var myChart = echarts.init(document.getElementById("' . $chartId . '"));');
        $this->addJqueryScript('var option = {');
        $this->addJqueryScript('animation: ' . (new YesNo($this->animation))->getText() . ',');
        $this->addJqueryScript('title: {');
        $this->addJqueryScript('text: "' . $this->chartTitle . '",');
        $this->addJqueryScript('left: "center",');
        $this->addJqueryScript('top: 0');
        $this->addJqueryScript('},');

        if ($this->showTooltip) {
            $this->addJqueryScript('tooltip: { show: true},');
        }

        if ($this->showLegend) {
            $this->addJqueryScript('legend: 
            { show: true, y: "bottom"},
            
            ');
        }

        $code = '  
        xAxis: {
        type: "category",
        data: ["' . $this->xAxisLabelDirectory->getTextWithSeperator('","') . '"]       
    },
        yAxis: {';

        if ($this->yUnit !== null) {
            $code .= 'axisLabel : {
        formatter: "{value}' . $this->yUnit . '",
            },';
        }

        if ($this->yMinValue !== null) {
            $code .= 'min: ' . $this->yMinValue . ',';
        }

        if ($this->yMaxValue !== null) {
            $code .= 'max: ' . $this->yMaxValue . ',';
        }

        $code .= '  },
        series: [';

        foreach ($this->dataList as $chartData) {

            /*
            smooth:true,
                itemStyle: {normal: {areaStyle: {type: 'default'}}},
    */

            $code .= '
        {
            type:
            "' . $chartData->chartType . '",';

            if ($chartData->legend !== null) {
                $code .= 'name: "' . $chartData->legend . '",';
            }

            //$code .= 'symbol: "none",';

            if ($chartData->smooth) {
                $code .= 'smooth: true,';
            }

            $code .= 'data: [' . $chartData->valueList->getTextWithSeperator(',') . ']
            
        },';

        }

        $code .= '
    ],';


        $this->addJqueryScript($code);

        $this->addJqueryScript('};');
        $this->addJqueryScript('myChart.setOption(option);');
        $this->addJqueryScript('');

        return parent::getContent();

    }

}