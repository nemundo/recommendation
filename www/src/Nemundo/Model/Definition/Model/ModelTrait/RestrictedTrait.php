<?php


namespace Nemundo\Model\Definition\Model\ModelTrait;


use Nemundo\Model\Type\Number\YesNoType;

// RestrictedModelTrait
trait RestrictedTrait
{

    /**
     * @var YesNoType
     */
    public $restricted;


    protected function loadRestrictedTrait()
    {

        $this->restricted = new YesNoType($this);
        $this->restricted->label = 'Restricted';
        $this->restricted->fieldName = 'restricted';

    }

}