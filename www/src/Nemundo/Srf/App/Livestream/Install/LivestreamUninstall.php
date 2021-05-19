<?php

namespace Nemundo\Srf\App\Livestream\Install;

use Nemundo\Content\App\Job\Setup\JobSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Srf\App\Livestream\Content\RadioLivestream\RadioLivestreamContentType;
use Nemundo\Srf\App\Livestream\Content\TvLivestream\TvLivestreamContentType;
use Nemundo\Srf\App\Livestream\Data\LivestreamModelCollection;
use Nemundo\Srf\App\Livestream\Job\LivestreamImportJob;


class LivestreamUninstall extends AbstractUninstall
{
    public function uninstall()
    {


        (new ContentTypeSetup())
            ->removeContentType(new RadioLivestreamContentType());

        //    ->removeContentType(new TvLivestreamContentType());

        (new JobSetup())
            ->removeJob(new LivestreamImportJob());

        (new ModelCollectionSetup())
            ->removeCollection(new LivestreamModelCollection());


    }
}