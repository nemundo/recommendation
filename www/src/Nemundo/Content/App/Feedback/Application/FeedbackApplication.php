<?php

namespace Nemundo\Content\App\Feedback\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Feedback\Data\FeedbackModelCollection;
use Nemundo\Content\App\Feedback\Install\FeedbackInstall;
use Nemundo\Content\App\Feedback\Site\FeedbackSite;

class FeedbackApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Feedback';
        $this->applicationId = '3be63106-65f8-421c-816f-c840e922f771';
        $this->modelCollectionClass = FeedbackModelCollection::class;
        $this->installClass = FeedbackInstall::class;
        $this->adminSiteClass = FeedbackSite::class;
    }
}