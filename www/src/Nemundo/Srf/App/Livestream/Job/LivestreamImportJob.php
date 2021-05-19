<?php


namespace Nemundo\Srf\App\Livestream\Job;


use Nemundo\Content\App\Job\Content\AbstractJobContentType;
use Nemundo\Srf\App\Livestream\Import\RadioLivestreamImport;


class LivestreamImportJob extends AbstractJobContentType
{

    protected function loadContentType()
    {

        $this->typeLabel = 'SRF Livestream Import';
        $this->typeId = '01f229ae-2463-4b24-9bbc-d5737b5054ca';

    }


    public function run()
    {

        (new RadioLivestreamImport())->importData();

    }

}