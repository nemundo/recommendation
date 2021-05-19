<?php

namespace Nemundo\App\ModelDesigner\Type;


trait ModelDesignerTypeTrait
{

    /**
     * @var string
     */
    public $modelDesignerFormPartClassName;

    abstract public function getAdditionalInformation();

}