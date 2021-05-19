<?php

namespace Nemundo\Content\App\Feed\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class FeedParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'feed';
    }
}