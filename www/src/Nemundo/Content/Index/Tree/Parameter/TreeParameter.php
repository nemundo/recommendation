<?php


namespace Nemundo\Content\Index\Tree\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class TreeParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {

        $this->parameterName = 'tree';

    }

}