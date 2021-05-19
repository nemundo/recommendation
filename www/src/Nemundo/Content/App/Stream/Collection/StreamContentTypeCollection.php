<?php

namespace Nemundo\Content\App\Stream\Collection;

use Nemundo\Content\Collection\AbstractContentTypeCollection;

class StreamContentTypeCollection extends AbstractContentTypeCollection
{

    protected function loadCollection()
    {

        $this->collection = 'Stream';
        $this->collectionId = 'bda9a1b3-e6ef-4ee1-88ce-29ceca965667';

        $this->loadData();

    }

}