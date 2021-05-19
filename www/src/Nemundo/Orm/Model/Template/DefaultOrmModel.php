<?php

namespace Nemundo\Orm\Model\Template;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Orm\Model\AbstractOrmModel;

class DefaultOrmModel extends AbstractOrmModel
{

    /**
     * @var bool
     */
    public $isDeleted = false;

    protected function loadModel()
    {

        $this->templateLabel = 'Default Model';
        $this->templateName = 'default';
        $this->templateId = 'df34ea61-459c-4c9c-9886-a5f8a1dad089';
        $this->templateExtendsClass = AbstractModel::class;

    }

}