<?php

namespace Nemundo\App\ModelDesigner\Builder;


use Nemundo\App\ModelDesigner\Collection\TypeCollection;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Orm\Model\AbstractOrmModel;

class TypeBuilder extends AbstractBase
{

    public function getType($text)
    {

        $value = null;
        foreach ((new TypeCollection())->getTypeCollection() as $type) {
            if ($type->typeName == $text) {
                $value = clone($type);
            }
        }

        return $value;

    }


    public function getTypeFromModel(AbstractOrmModel $model, $fieldName)
    {

        $value = null;

        foreach ($model->getTypeList(false, false) as $type) {

            if ($type->fieldName == $fieldName) {
                $value = $type;
            }
        }

        return $value;

    }

}