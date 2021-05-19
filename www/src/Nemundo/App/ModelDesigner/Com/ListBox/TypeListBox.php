<?php

namespace Nemundo\App\ModelDesigner\Com\ListBox;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class TypeListBox extends BootstrapListBox
{

    /**
     * @var AbstractModel
     */
    public $model;


    public function getContent()
    {

        $this->label = 'Type';
        foreach ($this->model->getTypeList() as $type) {
            $this->addItem($type->fieldName, $type->label);
        }

        return parent::getContent();

    }

}