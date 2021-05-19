<?php

namespace Nemundo\App\ModelDesigner\Parameter;


use Nemundo\App\ModelDesigner\Builder\TypeBuilder;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class FieldNameParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'field_name';
    }


    public function getType(AbstractOrmModel $model)
    {

        $type = (new TypeBuilder())->getTypeFromModel($model, $this->getValue());
        return $type;

    }

}