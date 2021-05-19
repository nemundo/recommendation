<?php

namespace Nemundo\Content\App\Feed\Job;


use Nemundo\Content\App\Feed\Import\FeedImport;
use Nemundo\Content\App\Job\Content\AbstractJobContentType;

class FeedImportJob extends AbstractJobContentType
{

    protected function loadContentType()
    {

        $this->typeLabel='Feed Import';
        $this->typeId='1aed9213-308e-4ecd-9fc3-0d04de0822e3';

    }


    public function run()
    {
        (new FeedImport())->importFeedList();

    }

}