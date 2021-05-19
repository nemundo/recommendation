<?php

namespace Nemundo\Package\Highcharts;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\Package\Jquery\Package\JqueryPackage;

class Highcharts extends AbstractHtmlContainer
{

    private static $chartCount = 0;


    use LibraryTrait;


    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $subtitle;

    /**
     * @var HighchartsType
     */
    public $chartType = HighchartsType::LINE;

    /**
     * @var string
     */
    public $xAxisTitle;

    /**
     * @var string
     */
    public $yAxisTitle;

    /**
     * @var int
     */
    public $height = 200;

    /**
     * @var TextDirectory
     */
    private $category;

    /**
     * @var HighchartsData[]
     */
    private $dataList;

    protected function loadContainer()
    {
        parent::loadContainer();
        $this->category = new TextDirectory();

        $this->addPackage(new JqueryPackage());
        $this->addJsUrl('https://code.highcharts.com/highcharts.js');


    }

    public function addCategory($category)
    {
        $this->category->addValue($category);
        return $this;
    }


    public function addData(HighchartsData $data)
    {
        $this->dataList[] = $data;
        return $this;
    }


    public function getContent()
    {

        $this->tagName = 'div';

        Highcharts::$chartCount++;
        $this->id = 'chart' . Highcharts::$chartCount;


        $this->addAttribute('style', 'width:100%; height:' . $this->height . 'px;');


        $this->addJqueryScript('var myChart = Highcharts.chart("' . $this->id . '", {');
        $this->addJqueryScript('chart: {');
        //$this->addJqueryScript('polar: true,');
        $this->addJqueryScript('type: "' . $this->chartType . '",');
        $this->addJqueryScript('animation: false ,');

        /*
        plotOptions: {
        series: {
            animation: false
    }
    }
*/

        $this->addJqueryScript('},');

        /*
                chart: {
                polar: true,
                type: 'column'
            },*/

        //$this->addJqueryScript('animation: {duration: 0},');


        $this->addJqueryScript('title: { text: "' . $this->title . '" },');


        if ($this->subtitle !== null) {
            $this->addJqueryScript('subtitle: { text: "' . $this->subtitle . '" },');
        }


        $this->addJqueryScript('credits: { enabled: false },');
        $this->addJqueryScript('tooltip: { enabled: false },');


        $this->addJqueryScript('plotOptions: {');
        $this->addJqueryScript('line: {');
        $this->addJqueryScript('animation: false,');
        $this->addJqueryScript('marker: { enabled: false },');
        $this->addJqueryScript('},');

        $this->addJqueryScript('column: {');
        $this->addJqueryScript('animation: false,');
        $this->addJqueryScript('},');





        $this->addJqueryScript('series: { allowPointSelect: false ,');
        $this->addJqueryScript('states: { hover: { enabled: false }},');


        $this->addJqueryScript('marker: { states: { hover: { enabled: false } } },');
        $this->addJqueryScript('},');

        $this->addJqueryScript('},');

        $this->addJqueryScript('xAxis: {');
        $this->addJqueryScript('title: {text: "' . $this->xAxisTitle . '" },');


        $cateogry = '"' . $this->category->getTextWithSeperator('","') . '"';
        $this->addJqueryScript('categories: [' . $cateogry . '] },');

        $this->addJqueryScript('yAxis: { title: {text: "' . $this->yAxisTitle . '" }},');
        $this->addJqueryScript('series: [');
        //$this->addJqueryScript('name: "Jane",');


        foreach ($this->dataList as $data) {

            /*
                        $line = '{name: "'.$data->title.'", data: [';
                        $valueList = new TextDirectory();

                        foreach ($data as $value) {
                            $valueList->addValue($value);
                        }
                        $line .= $valueList->getTextWithSeperator(',');
                        $line .= '] },';*/

            $this->addJqueryScript($data->getCode());

        }


        //$this->addJqueryScript('data: [1, 0, 40,2]');
        //$this->addJqueryScript('}, {');
        //$this->addJqueryScript('name: "John",');
        //$this->addJqueryScript('data: [5, 7, 3,4]');
        $this->addJqueryScript(']');
        $this->addJqueryScript('});');
        $this->addJqueryScript('');


        return parent::getContent();

    }

}