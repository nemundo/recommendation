<?php

namespace Nemundo\Admin\Parameter;


use Nemundo\Web\Parameter\AbstractUrlParameter;

class SortOrderParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'sort-order';
    }

    /*
     *
     * gibt Probleme, falls Parameter gesetzt wird
     *
    public function getValue()
    {

        $value = SortOrder::ASCENDING;
        if ($this->exists()) {
            $value = parent::getValue();
        }
        return $value;

    }*/

}