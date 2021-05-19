<?php

namespace Nemundo\Model\Definition\Model\ModelTrait;


use Nemundo\Orm\Type\Number\YesNoOrmType;

trait ActiveModelTrait
{

    /**
     * @var YesNoOrmType
     */
    public $active;


    public function loadActiveModelTrait()
    {

        $this->active = new YesNoOrmType($this);
        $this->active->fieldName = 'active';
        $this->active->variableName = 'active';
        $this->active->label = 'Active';
        $this->active->defaultValue = 1;  // true;
        /*$this->active->visible->form = false;
        $this->active->visible->table = false;
        $this->active->visible->view = false;*/
        $this->active->isEditable=false;

    }

}