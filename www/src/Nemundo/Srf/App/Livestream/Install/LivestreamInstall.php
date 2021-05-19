<?php

namespace Nemundo\Srf\App\Livestream\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Application\ContentApplication;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Srf\App\Livestream\Application\SrfLivestreamApplication;
use Nemundo\Srf\App\Livestream\Content\RadioLivestream\RadioLivestreamContentType;
use Nemundo\Srf\App\Livestream\Data\LivestreamModelCollection;
use Nemundo\Srf\App\Livestream\Script\LivestreamImportScript;


class LivestreamInstall extends AbstractInstall
{
    public function install()
    {

        //(new JobApplication())->installApp();


        (new ContentApplication())->installApp()->setAppMenuActive();


        (new ApplicationSetup())->addApplication(new SrfLivestreamApplication());
        (new ModelCollectionSetup())->addCollection(new LivestreamModelCollection());

        (new ContentTypeSetup(new SrfLivestreamApplication()))
            ->addContentType(new RadioLivestreamContentType());

        (new ScriptSetup(new SrfLivestreamApplication()))
            ->addScript(new LivestreamImportScript());


        //    ->addContentType(new TvLivestreamContentType());

        /*(new JobSetup())
            ->addJob(new LivestreamImportJob());*/


        //new \Nemundo\Srf\App\Livestream\Job\LivestreamImportJob()

    }
}