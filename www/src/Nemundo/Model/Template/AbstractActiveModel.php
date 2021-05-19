<?php

namespace Nemundo\Model\Template;

use Nemundo\Core\Language\LanguageCode;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Type\Number\YesNoType;

abstract class AbstractActiveModel extends AbstractModel
{

    /**
     * @var YesNoType
     */
    public $active;

    public function __construct()
    {

        parent::__construct();

        $this->active = new YesNoType($this);
        $this->active->label[LanguageCode::EN] = 'Active';
        $this->active->label[LanguageCode::DE] = 'Aktiv';
        $this->active->fieldName = 'active';
        $this->active->aliasFieldName = $this->tableName . '_active';
        $this->active->tableName = $this->tableName;
        $this->active->defaultValue = true;
        //$this->active->visible->form = false;
        //$this->active->visible->view = false;

    }

}