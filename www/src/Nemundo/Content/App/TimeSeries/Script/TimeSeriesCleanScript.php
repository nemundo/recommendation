<?php

namespace Nemundo\Content\App\TimeSeries\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\App\TimeSeries\Content\TimeSeries\TimeSeriesContentType;
use Nemundo\Content\App\TimeSeries\Data\TimeSeries\TimeSeriesReader;
use Nemundo\Content\App\TimeSeries\Data\TimeSeriesModelCollection;
use Nemundo\Content\App\TimeSeries\Install\TimeSeriesInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;

class TimeSeriesCleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'timeseries-clean';
    }

    public function run()
    {

        $reader=new TimeSeriesReader();
        foreach ($reader->getData() as $seriesRow) {
            (new TimeSeriesContentType($seriesRow->id))->deleteType();
        }

        (new ModelCollectionSetup())->removeCollection(new TimeSeriesModelCollection());

        (new TimeSeriesInstall())->install();

    }
}