<?php

namespace Nemundo\App\ModelDesigner\Model;


use Nemundo\Orm\Model\AbstractOrmModel;

class ModelDesignerOrmModel extends AbstractOrmModel
{

    /**
     * @var string
     */
    public $modelId;

    /**
     * @var bool
     */
    public $isDeleted = false;

    protected function loadModel()
    {

        $this->createAdminOrm = false;
        $this->createListBoxOrm = false;

    }

}