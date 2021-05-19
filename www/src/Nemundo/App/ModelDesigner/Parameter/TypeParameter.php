<?php

namespace Nemundo\App\ModelDesigner\Parameter;


use Nemundo\App\ModelDesigner\Builder\TypeBuilder;
use Nemundo\App\ModelDesigner\Collection\TypeCollection;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class TypeParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
   $this->parameterName = 'type';
    }


    public function getType() {


        /*$value = null;
        foreach ((new TypeCollection())->getTypeCollection() as $type) {
            if ($type->typeName == $this->getValue()) {
                $value = $type;
            }
        }*/

        $value = (new TypeBuilder())->getType($this->getValue());
        return $value;

    }


}