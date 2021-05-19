<?php

namespace Nemundo\Content\App\Podcast\Install;

use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\Content\App\Podcast\Application\PodcastApplication;
use Nemundo\Content\App\Podcast\Content\Episode\EpisodeContentType;
use Nemundo\Content\App\Podcast\Content\Podcast\PodcastContentType;
use Nemundo\Content\App\Podcast\Data\PodcastModelCollection;
use Nemundo\Content\App\Podcast\Scheduler\PodcastScheduler;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;

class PodcastInstall extends AbstractInstall
{
    public function install()
    {

        (new ApplicationSetup())->addApplication(new PodcastApplication());
        (new ModelCollectionSetup())->addCollection(new PodcastModelCollection());

        (new ContentTypeSetup(new PodcastApplication()))
            ->addContentType(new PodcastContentType())
            ->addContentType(new EpisodeContentType());

        (new SchedulerSetup(new PodcastApplication()))
            ->addScheduler(new PodcastScheduler());

    }
}