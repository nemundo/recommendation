<?php

namespace Nemundo\App\ModelDesigner\Type\Form;


use Nemundo\App\ModelDesigner\Type\ModelDesignerTypeTrait;
use Nemundo\Html\Container\HtmlContainer;
use Nemundo\Model\Type\AbstractModelType;

abstract class AbstractModelDesignerTypeFormPart extends HtmlContainer
{

    /**
     * @var string
     */
    //public $fieldId;

    /**
     * @var AbstractModelType|ModelDesignerTypeTrait
     */
    public $type;



    abstract public function getJson();


    //abstract public function saveData($fieldId);

    //abstract public function updateData();

}