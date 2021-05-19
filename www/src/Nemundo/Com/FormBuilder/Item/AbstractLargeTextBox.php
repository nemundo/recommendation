<?php

namespace Nemundo\Com\FormBuilder\Item;


use Nemundo\Html\Form\Textarea\Textarea;


abstract class AbstractLargeTextBox extends AbstractFormBuilderItem
{


    /**
     * @var int
     */
    public $rows;  // = 4;

    /**
     * @var int
     */
    public $cols;  // = 50;

    /**
     * @var bool
     */
    public $readOnly;

    /**
     * @var string
     */
    public $placeholder;

    /**
     * @var Textarea
     */
    protected $textarea;


    public function __construct($parentContainer = null)
    {
        parent::__construct($parentContainer);
        $this->textarea = new Textarea();
    }


    protected function prepareHtml()
    {
        $this->textarea->name = $this->name;
        $this->textarea->id = $this->name;
        $this->textarea->placeholder = $this->placeholder;
        $this->textarea->readOnly = $this->readOnly;
        $this->textarea->autofocus = $this->autofocus;
        $this->textarea->cols = $this->cols;
        $this->textarea->rows = $this->rows;
        $this->textarea->value = $this->value;
    }


    public function getValue()
    {

        $value = $this->getInternalValue();
        return $value;

    }

}