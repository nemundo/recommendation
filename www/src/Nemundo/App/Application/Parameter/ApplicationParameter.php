<?php

namespace Nemundo\App\Application\Parameter;


use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class ApplicationParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'application';
        $this->defaultValue = null;
    }


    public function getApplication()
    {

        $row = (new ApplicationReader())->getRowById($this->getValue());

        $application = null;

        $className = $row->applicationClass;
        if (class_exists($className)) {

            /** @var AbstractApplication $application */
            $application = new $className();

        }

        return $application;

    }

}