<?php

namespace Nemundo\Content\App\Listing\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Listing\Data\ListingCollection;

class ListingApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Listing';
        $this->applicationId = '39bb7283-6522-47f7-a319-50b47cbbc584';
        $this->modelCollectionClass = ListingCollection::class;
    }
}