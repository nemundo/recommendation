<?php

namespace Nemundo\Admin\Parameter;


use Nemundo\Core\Log\LogMessage;
use Nemundo\Web\Parameter\AbstractNumberUrlParameter;

class PageParameter extends AbstractNumberUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'page';
        $this->defaultValue = 0;
    }

    public function getValue()
    {

        $value = parent::getValue();
        if ($value < 0) {
            (new LogMessage())->writeError('Not allowed. Page lower than 0');
            exit;
        }

        return $value;

    }

}