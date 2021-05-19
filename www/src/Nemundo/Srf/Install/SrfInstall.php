<?php

namespace Nemundo\Srf\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\App\Job\Setup\JobSetup;
use Nemundo\Content\Install\ContentInstall;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Srf\Application\SrfApplication;
use Nemundo\Srf\Content\Livestream\SrfLivestreamContentType;
use Nemundo\Srf\Content\RadioShow\RadioShowContentType;
use Nemundo\Srf\Content\TvEpisode\TvEpisodeContentType;
use Nemundo\Srf\Content\TvShow\TvShowContentType;
use Nemundo\Srf\Data\MediaType\MediaType;
use Nemundo\Srf\Data\SrfModelCollection;
use Nemundo\Srf\Job\SrfImportJob;

use Nemundo\Srf\MediaType\AbstractMediaType;
use Nemundo\Srf\MediaType\RadioMediaType;
use Nemundo\Srf\MediaType\TvMediaType;
use Nemundo\Srf\Scheduler\SrfImportScheduler;
use Nemundo\Srf\Scheduler\SrfLivestreamScheduler;
use Nemundo\Srf\Script\SrfCleanScript;
use Nemundo\Srf\Script\SrfTestScript;
use Nemundo\Srf\Widget\Install\WidgetInstall;


class SrfInstall extends AbstractInstall
{

    public function install()
    {

        (new ContentInstall())->install();

        (new ApplicationSetup())
            ->addApplication(new SrfApplication());

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new SrfModelCollection());

        $this->addMediaType(new RadioMediaType());
        $this->addMediaType(new TvMediaType());

        $setup = new ScriptSetup(new SrfApplication());
        $setup->addScript(new SrfTestScript());
        $setup->addScript(new SrfCleanScript());

        (new SchedulerSetup(new SrfApplication()))
            ->addScheduler(new SrfImportScheduler())
            ->addScheduler(new SrfLivestreamScheduler());


        (new ContentTypeSetup(new SrfApplication()))
            ->addContentType(new TvEpisodeContentType())
            ->addContentType(new RadioShowContentType())
            ->addContentType(new TvShowContentType());


        //    ->addContentType(new SrfLivestreamContentType());




        /*(new JobSetup(new SrfApplication()))
            ->addJob(new SrfImportJob())
            ->addJob(new SrfLivestreamImportJob());

        (new ContentTypeSetup(new SrfApplication()))
            ->addContentType(new TvEpisodeContentType())
            ->addContentType(new RadioShowContentType())
            ->addContentType(new TvShowContentType())
            ->addContentType(new SrfLivestreamContentType());


        (new WidgetInstall())->install();


        (new SrfLivestreamImportJob())->saveType();*/


    }


    private function addMediaType(AbstractMediaType $mediaType)
    {

        $data = new MediaType();
        $data->updateOnDuplicate = true;
        $data->id = $mediaType->id;
        $data->media = $mediaType->media;
        $data->save();

    }

}