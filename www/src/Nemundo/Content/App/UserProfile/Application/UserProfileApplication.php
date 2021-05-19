<?php

namespace Nemundo\Content\App\UserProfile\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\UserProfile\Data\UserProfileModelCollection;

class UserProfileApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'User Profile';
        $this->applicationId = '1e18977f-f13a-4f29-b904-2212a42d4450';
        $this->modelCollectionClass = UserProfileModelCollection::class;
    }
}