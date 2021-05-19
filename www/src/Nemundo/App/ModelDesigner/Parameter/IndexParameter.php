<?php

namespace Nemundo\App\ModelDesigner\Parameter;


use Nemundo\App\ModelDesigner\Builder\IndexBuilder;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class IndexParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
   $this->parameterName='index';
    }


    public function getIndex(AbstractOrmModel $model) {


        //$index = (new IndexBuilder())->getIndex($this->getValue());

        $value = null;

        foreach ($model->getIndexList() as $index) {
            if ($index->indexName == $this->getValue()) {
              $value= $index;
            }
        }

        return $value;


    }

}