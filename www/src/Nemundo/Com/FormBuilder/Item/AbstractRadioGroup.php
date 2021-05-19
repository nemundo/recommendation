<?php

namespace Nemundo\Com\FormBuilder\Item;

use Nemundo\Core\Log\LogMessage;


class AbstractRadioGroup extends AbstractFormBuilderItem
{

    /**
     * @var string
     */
    public $label;

    /**
     * @var bool
     */
    public $submitOnChange = false;

    /**
     * @var
     */
    protected $groupLabel;


    /**
     * @var
     */
    protected $radioButtonList = array();

    /**
     * @var ListItem[]
     */
    protected $listItemList = [];


    protected function prepareHtml()
    {


    }


    public function getContent()
    {


        return parent::getContent();
    }


    function addItem($id, $label)
    {


        $item = new ListItem();
        $item->label = $label;
        $item->value = $id;

        $this->listItemList[] = $item;

        return $this;

    }

    public function getValue()
    {

        $value = $this->getInternalValue();
        return $value;

    }


    public function setValue($id, $value = true)
    {
        if (isset($this->radioButtonList[$id])) {
            $this->radioButtonList[$id]->setValue($value);
        } else {
            (new LogMessage())->writeError('CheckBox ' . $id . ' not exists.');
        }
        return $this;

    }

}