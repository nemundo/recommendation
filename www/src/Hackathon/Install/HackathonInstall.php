<?php

namespace Hackathon\Install;

use Hackathon\Application\HackathonApplication;
use Hackathon\Content\BajourArticle\BajourArticleContentType;
use Hackathon\Content\BajourJob\BajourImportJob;
use Hackathon\Content\Co2ImportJob\Co2ImportJobContentType;
use Hackathon\Content\SnbDevisen\SnbDevisenContentType;
use Hackathon\Content\SnbDevisenImport\SnbDevisenImportJob;
use Hackathon\Data\HackathonModelCollection;
use Hackathon\Scheduler\NewsImportScheduler;
use Hackathon\Setup\NewsContentTypeSetup;
use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\Content\App\Feed\Content\Item\FeedItemContentType;
use Nemundo\Content\App\Job\Setup\JobSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Srf\Content\TvEpisode\TvEpisodeContentType;

class HackathonInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())->addApplication(new HackathonApplication());
        (new ModelCollectionSetup())->addCollection(new HackathonModelCollection());

        (new JobSetup(new HackathonApplication()))
            ->addJob(new SnbDevisenImportJob())
            ->addJob(new BajourImportJob())
            ->addJob(new Co2ImportJobContentType());

        (new ContentTypeSetup(new HackathonApplication()))
            ->addContentType(new SnbDevisenContentType())
            ->addContentType(new BajourArticleContentType());

        (new NewsContentTypeSetup())
            ->addContentType(new BajourArticleContentType())
            ->addContentType(new TvEpisodeContentType())
            ->addContentType(new FeedItemContentType());

        (new SchedulerSetup(new HackathonApplication()))
            ->addScheduler(new NewsImportScheduler());


    }


}