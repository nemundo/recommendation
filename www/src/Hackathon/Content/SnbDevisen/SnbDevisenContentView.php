<?php

namespace Hackathon\Content\SnbDevisen;

use Hackathon\Data\Snb\SnbReader;
use Nemundo\Com\Chart\Data\LineChartData;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Echarts\Chart\Echart;

class SnbDevisenContentView extends AbstractContentView
{
    /**
     * @var SnbDevisenContentType
     */
    public $contentType;

    protected function loadView()
    {
        $this->viewName = 'default';
        $this->viewId = '69014f99-a4fc-4bcd-ba26-d3eb85f5bf25';
        $this->defaultView = true;
    }

    public function getContent()
    {


        $chart = new Echart($this);

        $line=new LineChartData($chart);

        foreach ($this->contentType->getTimeSeries() as $snbRow) {

            $chart->addXAxisLabel($snbRow->month.'/'.$snbRow->year);
            $line->addValue($snbRow->value);

            /*$p=new Paragraph($this);
            $p->content = $snbRow->value;*/

        }


        return parent::getContent();
    }
}