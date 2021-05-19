<?php


namespace Nemundo\Content\Index\Tree\Parameter;


use Nemundo\Content\Parameter\AbstractContentUrlParameter;

class ChildParameter extends AbstractContentUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'child';
    }

}