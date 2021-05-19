<?php


namespace Nemundo\Content\Index\Tree\Parameter;


use Nemundo\Content\Parameter\AbstractContentUrlParameter;

class ParentParameter extends AbstractContentUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'parent';
    }

}