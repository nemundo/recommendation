<?php


namespace Nemundo\Srf\Scheduler;


use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Srf\Import\RadioEpisodeImport;
use Nemundo\Srf\Import\RadioLivestreamImport;
use Nemundo\Srf\Import\RadioShowImport;
use Nemundo\Srf\Import\TvEpisodeImport;
use Nemundo\Srf\Import\TvShowImport;
use Nemundo\Srf\Token\SrfToken;

class SrfLivestreamScheduler extends AbstractScheduler
{

    protected function loadScheduler()
    {
        $this->consoleScript = true;
        $this->scriptName = 'srf-livestream';
    }


    public function run()
    {

        (new RadioLivestreamImport())->importData();

    }

}