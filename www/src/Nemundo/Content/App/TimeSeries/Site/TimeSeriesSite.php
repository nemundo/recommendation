<?php

namespace Nemundo\Content\App\TimeSeries\Site;

use Nemundo\Content\App\TimeSeries\Page\TimeSeriesPage;
use Nemundo\Web\Site\AbstractSite;

class TimeSeriesSite extends AbstractSite
{

    /**
     * @var TimeSeriesSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Time Series';
        $this->url = 'time-series';

        TimeSeriesSite::$site = $this;

        new NormalizedChartSite($this);
        new SaveLineSite($this);
        new DeleteLineSite($this);
        new ClearLineSite($this);


    }

    public function loadContent()
    {
        (new TimeSeriesPage())->render();
    }
}