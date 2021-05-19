<?php

namespace Nemundo\Content\App\TimeSeries\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesModelCollection;
use Nemundo\Content\App\TimeSeries\Install\TimeSeriesInstall;
use Nemundo\Content\App\TimeSeries\Site\TimeSeriesSite;

class TimeSeriesApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Time Series';
        $this->applicationId = '6477fbb9-0b48-47c9-a011-02b72f660b83';
        $this->modelCollectionClass = TimeSeriesModelCollection::class;
        $this->installClass = TimeSeriesInstall::class;
        $this->appSiteClass = TimeSeriesSite::class;
    }
}