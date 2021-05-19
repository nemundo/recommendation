<?php


namespace Nemundo\Content\App\Video\Application;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Video\Data\VideoModelCollection;
use Nemundo\Content\App\Video\Install\VideoInstall;
use Nemundo\Content\App\Video\Install\VideoUninstall;

class VideoApplication extends AbstractApplication
{

    protected function loadApplication()
    {
        $this->application = 'Video (YouTube/Vimeo)';
        $this->applicationId = 'a9755913-5b08-4546-a338-ae059c561447';
        $this->modelCollectionClass = VideoModelCollection::class;
        $this->installClass = VideoInstall::class;
        $this->uninstallClass = VideoUninstall::class;
    }

}