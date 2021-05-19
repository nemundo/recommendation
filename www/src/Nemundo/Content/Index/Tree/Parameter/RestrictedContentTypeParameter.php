<?php


namespace Nemundo\Content\Index\Tree\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class RestrictedContentTypeParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'restricted-content-type';
    }

}