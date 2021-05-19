<?php

namespace Nemundo\Package\Echarts\Package;


use Nemundo\Com\Package\AbstractPackage;

class EchartsPackage extends AbstractPackage
{

    protected function loadPackage()
    {
        $this->packageName = 'echarts';
        $this->addJs('echarts.common.min.js');
    }

}