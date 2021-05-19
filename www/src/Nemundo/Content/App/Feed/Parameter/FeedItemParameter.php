<?php

namespace Nemundo\Content\App\Feed\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class FeedItemParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'feeditem';
    }
}