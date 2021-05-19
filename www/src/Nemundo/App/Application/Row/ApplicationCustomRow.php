<?php


namespace Nemundo\App\Application\Row;

// Nemundo\App\Application\Row\ApplicationCustomRow

use Nemundo\App\Application\Data\Application\ApplicationRow;
use Nemundo\App\Application\Type\AbstractApplication;

class ApplicationCustomRow extends ApplicationRow
{

    public function getApplication()
    {

        $application = null;

        $className = $this->applicationClass;
        if (class_exists($className)) {

            /** @var AbstractApplication $application */
            $application = new $className();

        }

        return $application;

    }

}