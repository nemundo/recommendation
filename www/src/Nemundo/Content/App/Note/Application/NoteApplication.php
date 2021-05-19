<?php

namespace Nemundo\Content\App\Note\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\Note\Data\NoteModelCollection;
use Nemundo\Content\App\Note\Install\NoteInstall;

class NoteApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Note';
        $this->applicationId = 'b425c8c5-f68d-4aec-845c-3d3016b50f8a';
        $this->modelCollectionClass = NoteModelCollection::class;
        $this->installClass=NoteInstall::class;
    }
}