<?php

namespace Nemundo\App\ModelDesigner\Parameter;


use Nemundo\App\ModelDesigner\Json\AppJson;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class ModelParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'model';
    }


    public function getModel(AppJson $appJson,$hideDeletedModel=true) {

        $model = $appJson->getModelByTableName($this->getValue(),$hideDeletedModel);
        return $model;

    }


}