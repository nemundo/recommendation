<?php

namespace Nemundo\Content\App\Job\Row;


// Nemundo\Content\App\Job\Row\JobCustomRow

use Nemundo\Content\App\Job\Content\AbstractJobContentType;
use Nemundo\Content\App\Job\Data\Job\JobRow;

class JobCustomRow extends JobRow
{

    public function getJob() {


        /** @var AbstractJobContentType $job */
        $job = new $this->contentType->phpClass();

        return $job;

    }

}