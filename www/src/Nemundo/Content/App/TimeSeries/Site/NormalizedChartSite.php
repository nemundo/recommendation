<?php

namespace Nemundo\Content\App\TimeSeries\Site;

use Nemundo\Content\App\TimeSeries\Page\NormalizedChartPage;
use Nemundo\Web\Site\AbstractSite;

class NormalizedChartSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Normalized Chart';
        $this->url = 'normalized-chart';
    }

    public function loadContent()
    {
        (new NormalizedChartPage())->render();
    }
}