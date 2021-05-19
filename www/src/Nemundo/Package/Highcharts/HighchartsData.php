<?php

namespace Nemundo\Package\Highcharts;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Directory\TextDirectory;

class HighchartsData extends AbstractBase
{

    /**
     * @var string
     */
    public $title;

    /**
     * @var TextDirectory
     */
    public $valueList;

    public function __construct(Highcharts $highcharts = null)
    {
        if ($highcharts !== null) {
            $highcharts->addData($this);
        }
        $this->valueList = new TextDirectory();
    }

    public function addValue($value)
    {
        $this->valueList->addValue($value);
        return $this;
    }


    public function getCode()
    {
        $code = '{name: "' . $this->title . '", data: [';
        $code .= $this->valueList->getTextWithSeperator(',');
        $code .= ']},';

        return $code;
    }


}