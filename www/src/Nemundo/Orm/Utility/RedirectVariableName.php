<?php

namespace Nemundo\Orm\Utility;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\OrmTypeTrait;

class RedirectVariableName extends AbstractBase
{

    /**
     * @var AbstractOrmModel
     */
    public $model;

    /**
     * @var AbstractModelType|OrmTypeTrait
     */
    public $type;


    public function getVariableName()
    {

        $variableName = 'redirect' . $this->model->className . (new UppercaseFirstLetter())->uppercaseFirstLetter($this->type->variableName) . 'Site';
        return $variableName;

    }

}