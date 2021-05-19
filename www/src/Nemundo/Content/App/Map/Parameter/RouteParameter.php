<?php

namespace Nemundo\Content\App\Map\Parameter;

use Nemundo\Content\App\Map\Content\Route\RouteContentType;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class RouteParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'route';
    }


    public function getRouteContent()
    {

        $content = (new RouteContentType($this->getValue()));
        return $content;

    }


}