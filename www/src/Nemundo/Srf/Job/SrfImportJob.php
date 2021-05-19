<?php


namespace Nemundo\Srf\Job;


use Nemundo\App\Scheduler\Job\AbstractScheduler;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\App\Job\Content\AbstractJobContentType;
use Nemundo\Content\App\Job\Type\AbstractJob;
use Nemundo\Srf\Application\SrfApplication;
use Nemundo\Srf\Import\RadioEpisodeImport;
use Nemundo\Srf\Import\RadioLivestreamImport;
use Nemundo\Srf\Import\RadioShowImport;
use Nemundo\Srf\Import\SrfImport;
use Nemundo\Srf\Import\TvEpisodeImport;
use Nemundo\Srf\Import\TvShowImport;
use Nemundo\Srf\Token\SrfToken;

class SrfImportJob extends AbstractJobContentType
{


    protected function loadContentType()
    {

        $this->typeLabel='SRF Import';
        $this->typeId='e362f427-44cd-49df-9460-165e15b41557';

    }


    public function run()
    {

        (new SrfImport())->importData();

    }

}