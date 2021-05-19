<?php

namespace Nemundo\Com\FormBuilder\Item;


use Nemundo\Core\Sorting\SortingListOfObject;
use Nemundo\Html\Form\Select\Optgroup;
use Nemundo\Html\Form\Select\Option;
use Nemundo\Html\Form\Select\Select;
use Nemundo\Web\Parameter\UrlParameterList;


abstract class AbstractListBox extends AbstractFormBuilderItem
{

    /**
     * @var bool
     */
    public $multiSelect = false;

    /**
     * @var bool
     */
    public $sortingByLabel = false;

    /**
     * @var bool
     */
    public $sortingByValue = false;

    /**
     * @var bool
     */
    public $submitOnChange = false;

    /**
     * @var bool
     */
    public $disabled = false;

    /**
     * @var bool
     */
    public $validation = false;

    /**
     * @var bool
     */
    public $emptyValueAsDefault = true;

    /**
     * @var Select
     */
    protected $select;

    /**
     * @var Option[]
     */
    private $optionList = [];


    public function __construct($parentContainer = null)
    {
        $this->select = new Select();
        parent::__construct($parentContainer);
    }


    protected function prepareHtml()
    {

        $this->select->name = $this->name;
        $this->select->id = $this->name;
        $this->select->disabled = $this->disabled;
        $this->select->multiple = $this->multiSelect;

        if ($this->submitOnChange) {
            $this->select->addAttribute('onchange', 'this.form.submit()');
        }

        if ($this->emptyValueAsDefault) {
            $option = new Option($this->select);
            $option->value = '';
            $option->label = '';
        }

        if ($this->sortingByLabel) {
            $sorting = new SortingListOfObject();
            $sorting->objectList = $this->optionList;
            $sorting->sortingProperty = 'label';
            $this->optionList = $sorting->getSortedListOfObject();
        }

        if ($this->sortingByValue) {
            $sorting = new SortingListOfObject();
            $sorting->objectList = $this->optionList;
            $sorting->sortingProperty = 'value';
            $this->optionList = $sorting->getSortedListOfObject();
        }

        if ($this->searchMode) {
            if ($this->multiSelect) {
                $this->value = $this->getMultiValue();

                if ($this->value == null) {
                    $this->value = [];
                }

            } else {
                $this->value = $this->getValue();
            }
        }

        foreach ($this->optionList as $option) {

            if ($option->isObjectOfClass(Option::class)) {

                if ($this->multiSelect) {

                    if (is_array($this->value)) {
                        if (in_array($option->value, $this->value)) {
                            $option->selected = true;
                        }
                    }

                } else {
                    if ($this->value == $option->value) {
                        $option->selected = true;
                    }
                }
            }

            $this->select->addContainer($option);

        }

    }


    public function getValue()
    {

        $value = null;
        if ($this->multiSelect) {

            $parameter = new UrlParameterList();
            $parameter->parameterName = $this->name;
            $value = $parameter->getValueList();

        } else {

            $value = $this->getInternalValue();

        }

        return $value;

    }


    public function hasValue()
    {

        $returnValue = true;

        if ($this->multiSelect) {

            $parameter = new UrlParameterList();
            $parameter->parameterName = $this->name;

            if ($parameter->notExists()) {
                $returnValue = false;
            }


        } else {
            $value = $this->getValue();
            if (($value == '') || ($value == '0')) {
                $returnValue = false;
            }
        }

        return $returnValue;

    }


    // getValueList
    public function getMultiValue()
    {

        $parameter = new UrlParameterList();
        $parameter->parameterName = $this->name;
        $valueList = $parameter->getValueList();

        return $valueList;

    }


    public function addItem($value, $label = '')
    {

        $option = new Option();
        $option->value = $value;
        $option->label = $label;
        $this->optionList[] = $option;

        return $this;

    }


    public function addItemTitle($title)
    {

        $optgroup = new Optgroup();
        $optgroup->label = $title;

        $this->optionList[] = $optgroup;

        return $this;

    }


    public function addOption(Option $option)
    {

        $this->optionList[] = $option;
        return $this;

    }

}