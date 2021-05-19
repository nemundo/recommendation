<?php

namespace Nemundo\Model\Definition\Model\ModelTrait;

use Nemundo\Orm\Type\DateTime\CreatedDateTimeOrmType;
use Nemundo\Orm\Type\User\CreatedUserOrmType;


trait UserDateTimeModelTrait
{

    /**
     * @var CreatedUserOrmType
     */
    public $user;

    /**
     * @var CreatedDateTimeOrmType
     */
    public $dateTime;


    protected function loadUserDateTimeTrait()
    {

        $this->user = new CreatedUserOrmType($this);
        $this->user->fieldName = 'user';
        $this->user->variableName = 'user';

        $this->dateTime = new CreatedDateTimeOrmType($this);
        $this->dateTime->fieldName = 'date_time';
        $this->dateTime->variableName = 'dateTime';

    }

}