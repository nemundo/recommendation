<?php

namespace Nemundo\Orm\Model\Template;


use Nemundo\Model\Template\AbstractActiveModel;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\Number\YesNoOrmType;

class ActiveOrmModel extends AbstractOrmModel
{

    /**
     * @var YesNoOrmType
     */
    public $active;


    public function __construct()
    {

        parent::__construct();

        $this->templateLabel = 'Active Model';
        $this->templateName='active_model';
        $this->templateId = '97fe41af-2192-46f4-8477-8ccc58f6aeb0';
        $this->templateExtendsClass = AbstractActiveModel::class;

        $this->active = new YesNoOrmType($this);
        $this->active->label = 'Active';
        $this->active->fieldName = 'active';
        $this->active->variableName = 'active';
        $this->active->createModelProperty = false;
        $this->active->isEditable=false;

    }


    protected function loadModel()
    {

    }

}