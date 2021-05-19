<?php


namespace Nemundo\Srf\Scheduler;


use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\Srf\Import\RadioEpisodeImport;
use Nemundo\Srf\Import\RadioShowImport;
use Nemundo\Srf\Import\SrfImport;
use Nemundo\Srf\Import\TvEpisodeImport;
use Nemundo\Srf\Import\TvShowImport;

class SrfImportScheduler extends AbstractScheduler
{

    protected function loadScheduler()
    {

        //$this->active = false;  // true;
        $this->hour = 2;

        $this->consoleScript = true;
        $this->scriptName = 'srf-import';

    }


    public function run()
    {

        (new SrfImport())->importData();

    }

}